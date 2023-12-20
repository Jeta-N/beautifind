<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\PortfolioImage;
use App\Models\Promotion;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceServiceType;
use App\Models\ServiceType;
use App\Models\User;
use DeepCopy\Filter\Filter;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function viewHomePage()
    {
        $rec_services = [];
        if (Auth::check()) {
            $rec_services = $this->rec_service();
        }
        // $services = $this->servicesByType();
        return view('pages.home', [
            // 'rec_services' => $rec_services,
            // 'services' => $services,
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
                    if ($sst->service->city_id == $user->city_id && $sst->service->service_status == 'Active') {
                        $service_score[$sst->service_id] = 1;
                    }
                }
            }
        }
        $random = 3;
        if (count($service_score) < 3){
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
        $filterRating = $request->input('rating', []);
        $filterPrice = $request->input('price', []);
        $sortBy = $request->input('sort-by', []);

        $service_types = null;
        if ($service_types == null) {
            $query = Service::orderBy('service_name');
        } else {
            $serviceTypeIds = ServiceServiceType::whereIn('st_id', $service_types)->distinct()->pluck('service_id');
            $query = Service::whereIn('service_id', $serviceTypeIds);
        }

        if ($searchName != null) {
            $query->where('service_name', 'LIKE', '%' . $searchName . '%');
        }

        if ($filterType != null && $filterType != []) {
            $query->whereIn('service_id', function ($query) use ($filterType) {
                $query->select('service_id')
                    ->from('service_service_type')
                    ->whereIn('st_id', $filterType);
            });
        }

        $services = $query
            ->withAvg('review', 'rating') // Eager load average rating
            ->get();


        return view('pages.search')->with('services', $services);
    }

    public function viewServicesDetails(Request $request)
    {
        $service_id = $request->route('id');
        $service = Service::find($service_id);

        $faqs = Faq::where('service_id', '=', $service_id)->get();
        $ports = PortfolioImage::where('service_id', '=', $service_id)->get();
        $promos = Promotion::where('service_id', '=', $service_id)->get();

        return view('viewServiceDetails')->with('service', $service)->with('faqs', $faqs)->with('ports', $ports)->with('promos', $promos);
    }
}
