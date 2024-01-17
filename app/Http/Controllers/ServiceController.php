<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\City;
use App\Models\Employee;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceServiceType;
use App\Models\ServiceType;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

class ServiceController extends Controller
{
    public function viewHomePage()
    {
        $rec_services = [];
        if (Auth::check()) {
            $rec_services = $this->rec_service();
        } else {
            $rec_services = Service::where('is_active', '=', true)->inRandomOrder()->take(8)->get();
        }

        $cityIds = City::Take(4)->pluck('city_id');
        $serviceCounts = [];

        foreach ($cityIds as $cityId) {
            $count = Service::where('city_id', $cityId)->count();
            $serviceCounts[$cityId] = $count;
        }

        $reviews = Review::all()->sortByDesc('review_id')->take(9);

        return view('pages.home', [
            'rec_services' => $rec_services,
            'serviceCounts' => $serviceCounts,
            'reviews' => $reviews
        ]);
    }

    private function rec_service()
    {
        $acc_id = Auth::user()->account_id;
        $user = User::where('account_id', '=', $acc_id)->first();

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
        if (count($service_score) < 5) {
            $random = count($service_score);
        }
        $recommender = array_rand($service_score, $random);
        $rec_services = [];

        foreach ($recommender as $rec) {
            $rec_services[] = Service::find($rec);
        }

        return $rec_services;
    }

    public function viewServicesList(Request $request)
    {
        $searchName = $request->input('service-name');
        $filterType = $request->input('type', []);
        $filterRating = $request->input('rating');
        $filterCity = $request->input('city', []);
        $sortBy = $request->input('sort-by');


        $query = Service::query();
        $query = $query->where('is_active', '=', true);
        if ($searchName) {
            $query->where('service_name', 'LIKE', '%' . $searchName . '%');
        }

        if ($filterType && !is_null($filterType[0])) {
            $query->whereHas('serviceServiceType', function ($subquery) use ($filterType) {
                $subquery->whereIn('st_id', $filterType);
            });
        }

        if ($filterCity && !is_null($filterCity[0])) {
            $query->whereHas('city', function ($subquery) use ($filterCity) {
                $subquery->whereIn('city_id', $filterCity);
            });
        }

        $ratings = DB::table('review')->select('service_id', DB::raw('AVG(rating) as rating'))->groupBy('service_id');
        $query->leftJoinSub($ratings, 'ratings', function (JoinClause $join) {
            $join->on('service.service_id', '=', 'ratings.service_id');
        })
            ->select(DB::raw('service.*,ratings.rating as rating'));

        $emps = Employee::query();
        $emps->select('emp_id', 'service_id');
        $prices = $emps->join('employee_service_type', 'employee_service_type.emp_id', '=', 'employee.emp_id')->select('service_id', DB::raw('MIN(price) as min_price'))->groupBy('employee.service_id');
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
        $query->withAvg('review', 'rating');

        if ($filterRating && $filterRating != []) {
            $query->having('review_avg_rating', '>', $filterRating);
        }
        $services = $query->get();

        return view('pages.search')->with('services', $services);
    }

    public function viewServicesDetails(Request $request)
    {
        $service_id = $request->route('id');

        $serviceTypeIds = ServiceServiceType::where('service_id', $service_id)->pluck('st_id')->toArray();

        $serviceTypesWithEmployees = ServiceType::whereIn('st_id', $serviceTypeIds)
            ->whereHas('employeeServiceType.employee', function ($query) use ($service_id) {
                $query->where('service_id', $service_id);
            })
            ->with(['employeeServiceType.employee'])
            ->get();

        $reviews =  Review::where('service_id', $service_id)
            ->with('user')
            ->with('booking')
            ->with('booking.serviceType')
            ->with('booking.bookingSlot')
            ->with('booking.bookingSlot.employee')
            ->get();

        $service = Service::with([
            'faq',
            'portfolioImage',
            'promotion',
            'serviceServiceType',
            'serviceServiceType.serviceType'
        ])
            ->withAvg('review', 'rating')
            ->withCount('review')
            ->find($service_id);

        return view('pages.detail', [
            'services' => $service,
            'serviceTypesAvailable' => $serviceTypesWithEmployees,
            'reviews' => $reviews
        ]);
    }

    public function staffService()
    {
        $acc_id = Auth::user()->account_id;
        $acc_role = Auth::user()->account_role;

        if ($acc_role == 'Super Admin') {
            $service_id = SuperAdmin::where('account_id', '=', $acc_id)->pluck('service_id');
        } else {
            $service_id = Employee::where('account_id', '=', $acc_id)->pluck('service_id');
        }

        $service = Service::with([
            'faq',
            'portfolioImage',
            'promotion',
            'serviceServiceType',
            'serviceServiceType.serviceType'
        ])->find($service_id)->first();

        return view('pages.staff.salon-profile', [
            'service' => $service
        ]);
    }

    public function deleteService(Request $request)
    {
        $service = Service::find($request->id);
        $admin = SuperAdmin::where('service_id', '=', $service->service_id)->first();
        $service->delete();
        $admin->delete();
        $admin->account->delete();

        foreach ($service->employee as $emp) {
            foreach ($emp->employeeServiceType as $est) {
                $est->delete();
            }
            $emp->delete();
        }

        foreach ($service->faq as $faq) {
            $faq->delete();
        }

        foreach ($service->portfolioImage as $pi) {
            $pi->delete();
        }

        foreach ($service->promotion as $promo) {
            $promo->delete();
        }

        foreach ($service->serviceServiceType as $sst) {
            $sst->delete();
        }

        foreach ($service->bookingSlot as $bs) {
            if ($bs->is_available) {
                $bs->delete();
            }
        }

        $bookings = Booking::where('service_id', '=', $service->service_id)->get();
        $reviews = Review::whereIn('booking_id', $bookings->pluck('booking_id'));
        $reviews->delete();

        return redirect()->back()->with('successDeleteService', 'Service has been deleted.');
    }

    public function updateServiceProfile(Request $request)
    {
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $emp = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $emp = Employee::where('account_id', '=', $acc_id)->first();
        }

        $service = Service::find($emp->service_id);

        try {
            $this->validate($request, [
                'name' => 'required | min:5',
                'description' => 'required',
                'opening_hours' => 'required',
                'address' => 'required | min:5',
                'phone' => 'required | min:9 | max:13',
                'logo_image' => 'image',
                'service_image' => 'image'
            ]);
        } catch (ValidationException $e) {
            $errors = $e->errors();
            if (!($errors instanceof MessageBag)) {
                $errors = new MessageBag($errors);
            }
            $errors->add('validation_scenario', 'profile');
            return redirect()->back()->withErrors($errors)->withInput();
        }

        try {
            if ($request->email) {
                $this->validate($request, [
                    'email' => 'email'
                ]);
            }
        } catch (ValidationException $e) {
            $errors = $e->errors();
            if (!($errors instanceof MessageBag)) {
                $errors = new MessageBag($errors);
            }
            $errors->add('validation_scenario', 'profile');
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $service->service_name = $request->name;
        $service->service_description = $request->description;
        $service->service_opening_hours = $request->opening_hours;
        $service->service_address = $request->address;
        $service->service_phone = $request->phone;

        if ($request->filled('email')) {
            $service->service_email = $request->email;
        } else {
            $service->service_email = null;
        }

        if ($request->filled('instagram')) {
            $service->service_instagram = $request->instagram;
        } else {
            $service->service_instagram = null;
        }

        if ($request->filled('logo_image')) {
            $file = $request->file('logo_image');
            $logo_img_name = $emp->service_id . '_logo_image_' . time() . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/asset/images/services/logo', $file, $logo_img_name);

            $service->logo_image_path = $logo_img_name;
        }

        if ($request->filled('service_image')) {
            $file = $request->file('service_image');
            $service_img_name = $emp->service_id . '_service_image_' . time() . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/asset/images/services/thumbnail', $file, $service_img_name);

            $service->service_image_path = $service_img_name;
        }

        $service->save();
        return redirect()->back()->with('successUpdateService', 'Service profile has been updated.');
    }

    public function activateService()
    {
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $emp = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $emp = Employee::where('account_id', '=', $acc_id)->first();
        }
        $service = Service::find($emp->service_id);

        if (
            is_null($service->service_name) || is_null($service->service_description) || is_null($service->service_opening_hours)
            || is_null($service->service_address) || is_null($service->service_phone) || is_null($service->serviceServiceType) || count($service->employee) < 1
        ) {
            return redirect()->back()->with('errorActivate', 'Please complete the service profile.');
        }

        $service->is_active = true;
        $service->save();

        return redirect()->back();
    }

    public function deactivateService()
    {
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $emp = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $emp = Employee::where('account_id', '=', $acc_id)->first();
        }
        $service = Service::find($emp->service_id);

        $service->is_active = false;
        $service->save();

        return redirect()->back();
    }

    public function adminServices(Request $request)
    {
        $services = Service::query();
        $servicesName = Service::pluck('service_name');

        if ($request->name) {
            $services->where('service_name', 'like', '%' . $request->name . '%');
        }

        if ($request->service) {
            $services->where('service_id', '=', $request->service);
        }
        if ($request->status != null) {
            $services->where('is_active', '=', $request->status);
        }
        // dd($request->status);
        $services = $services->get();

        return view('pages.admin.services', [
            'services' => $services,
            'servicesName' => $servicesName
        ]);
    }

    public function viewServiceProfile(Request $request)
    {
        $service = Service::find($request->id);

        return view('pages.admin.service-profile', [
            'service' => $service
        ]);
    }
}
