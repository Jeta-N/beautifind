<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Employee;
use App\Models\Faq;
use App\Models\PortfolioImage;
use App\Models\Promotion;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceServiceType;
use App\Models\ServiceType;
use App\Models\SuperAdmin;
use App\Models\User;
use DeepCopy\Filter\Filter;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function viewHomePage()
    {
        $rec_services = [];
        if (Auth::check()) {
            $rec_services = $this->rec_service();
        }
        $services = $this->servicesByType();
        return view('pages.home', [
            'rec_services' => $rec_services,
            'services' => $services,
        ]);
    }

    private function rec_service()
    {
        $acc_id = Auth::user()->account_id;
        $user = User::where('account_id', '=', $acc_id)->first();
        // dd($user);
        $service_score = [];
        $service_types = [];

        foreach ($user->userServiceType as $ust) {
            $service_types[] = $ust->serviceType;
        }

        foreach ($service_types as $st) {
            foreach ($st->serviceServiceType as $sst) {
                if (isset($service_score[$sst->service_id])) {
                    $service_score[$sst->service_id] += 1;
                } else {
                    if ($sst->service->city_id == $user->city_id && $sst->service->is_active) {
                        $service_score[$sst->service_id] = 1;
                    }
                }
            }
        }
        $random = 3;
        if (count($service_score) < 3) {
            $random = count($service_score);
        }
        $recommender = array_rand($service_score, $random);
        $rec_services = [];

        foreach ($recommender as $rec) {
            $rec_services[] = Service::find($rec);
        }

        return $rec_services;
    }

    private function servicesByType()
    {
        $st = 1;
        $sst_array = ServiceServiceType::where('st_id', '=', $st)->inRandomOrder()->limit(2)->get();
        $services = [];
        foreach ($sst_array as $sst) {
            $services[] = Service::find($sst->service_id);
        }

        return $services;
    }

    public function viewServicesList(Request $request)
    {
        $searchName = $request->input('service-name');
        $filterType = $request->input('type', []);
        $filterRating = $request->input('rating');
        $sortBy = $request->input('sort-by');

        $query = Service::query();

        if ($searchName) {
            $query->where('service_name', 'LIKE', '%' . $searchName . '%');
        }

        if ($filterType && count($filterType) > 0) {
            $query->whereHas('serviceServiceType', function ($subquery) use ($filterType) {
                $subquery->whereIn('st_id', $filterType);
            });
        }

        $ratings = DB::table('review')->select('service_id', DB::raw('AVG(rating) as rating'))->groupBy('service_id');
        $query->leftJoinSub($ratings, 'ratings', function (JoinClause $join) {
                $join->on('service.service_id', '=', 'ratings.service_id');
            })
            ->select(DB::raw('service.*,ratings.rating as rating'));

        $emps = Employee::query();
        $emps->select('emp_id','service_id');
        $prices = $emps->join('employee_service_type','employee_service_type.emp_id', '=','employee.emp_id')->select('service_id', DB::raw('MIN(price) as min_price'))->groupBy('employee.service_id');
        $query->leftJoinSub($prices, 'prices', function (JoinClause $join) {
            $join->on('service.service_id', '=', 'prices.service_id');
        })
        ->select(DB::raw('service.*,prices.min_price as min_price'));

        // Handle sorting
        switch ($sortBy) {
            case 1:
                $query->orderBy('service_name');
                break;
            case 2:
                $query->orderByDesc('service_name');
                break;
            case 3:
                //sort by price ascending
                $query->orderBy('min_price');
                break;
            case 4:
                //sort by price desc
                $query->orderByDesc('min_price');
                break;
            case 5:
                //sort by rating asc
                $query->orderBy('rating');
                break;
            case 6:
                //sort by rating desc
                $query->orderByDesc('rating');
                break;
            default:
                $query->orderBy('service_name');
        }
        $query->withCount('review');
        $query->with('city');
        $query->with('serviceServiceType');
        $query->with('serviceServiceType.serviceType');

        if ($filterRating && $filterRating != []) {
            $query->where('rating', '>', $filterRating);
        }
        $services = $query->get();

        return view('pages.search')->with('services', $services);
    }

    public function viewServicesDetails(Request $request)
    {
        $service_id = $request->route('id');
        $service = Service::with([
            'faq',
            'portfolioImage',
            'promotion',
            'employee',
            'serviceServiceType',
            'serviceServiceType.serviceType',
            'serviceServiceType.serviceType.employeeServiceType',
            'serviceServiceType.serviceType.employeeServiceType.employee',
        ])->find($service_id);

        return view('pages.detail', [
            'services' => $service
        ]);
    }

    public function deleteService(Request $request){
        $service = Review::find($request->service_id);
        $service->delete();

        foreach($service->employee as $emp){
            foreach($emp->employeeServiceType as $est){
                $est->delete();
            }
            $emp->delete();
        }

        foreach($service->faq as $faq){
            $faq->delete();
        }

        foreach($service->portfolioImage as $pi){
            $pi->delete();
        }

        foreach($service->promotion as $promo){
            $promo->delete();
        }

        foreach($service->serviceServiceType as $sst){
            $sst->delete();
        }

        foreach($service->bookingSlot as $bs){
            if ($bs->is_available){
                $bs->delete();
            }
        }

        $bookings = Booking::where('service_id', '=', $service->service_id)->get();
        foreach($bookings->review as $review){
            $review->delete();
        }

        return redirect()->back();
    }

    public function updateServiceProfile(Request $request){
        $this->validate($request, [
            'name' => 'required | min:5',
            'description' => 'required',
            'opening hours' => 'required',
            'address' => 'required | min:5',
            'phone' => 'required | min:10 | max:13',
            'email' => 'email | unique:service,service_email',
            'logo_image' => 'image',
            'service_image' => 'image'
        ]);

        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin'){
            $emp = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $emp = Employee::where('account_id','=',$acc_id)->first();
        }

        $service = Service::find($emp->service_id);

        $service->service_name = $request->name;
        $service->service_description = $request->description;
        $service->service_opening_hours = $request->opening_hours;
        $service->service_address = $request->address;
        $service->service_phone = $request->phone;

        if($request->filled('email')){
            $service->service_email = $request->email;
        }else{
            $service->service_email = null;
        }

        if($request->filled('instagram')){
            $service->service_instagram = $request->instagram;
        }else{
            $service->service_instagram = null;
        }

        if($request->filled('logo_image')){
            $file = $request->file('logo_image');
            $logo_img_name = $emp->service_id.'_logo_image_'.time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/images', $file, $logo_img_name);

            $service->logo_image_path = $logo_img_name;
        }

        if($request->filled('service_image')){
            $file = $request->file('service_image');
            $service_img_name = $emp->service_id.'_service_image_'.time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/images', $file, $service_img_name);

            $service->service_image_path = $service_img_name;
        }

        $service->save();
        return redirect()->back();
    }

    public function activateService (Request $request){
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin'){
            $emp = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $emp = Employee::where('account_id','=',$acc_id)->first();
        }
        $service = Service::find($emp->service_id);

        if(is_null($service->service_name) || is_null($service->service_description) || is_null($service->service_opening_hours) || is_null($service->service_address) || is_null($service->service_phone)){
            return redirect()->back()->with('error', 'Please complete the service profile.');
        }

        $service->is_active = true;
        $service->save();

        return redirect()->back();
    }

    public function deactivateFAQ(){
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin'){
            $emp = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $emp = Employee::where('account_id','=',$acc_id)->first();
        }
        $service = Service::find($emp->service_id);

        $service->is_active = true;
        $service->save();

        return redirect()->back();
    }
}
