<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceServiceType;
use App\Models\ServiceType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                    if ($sst->service->city_id == $user->city_id && $sst->service->service_status == 'Active') {
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
        $filterCity = $request->input('city', []);
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

        if ($filterCity && count($filterCity) > 0) {
            $query->whereHas('city', function ($subquery) use ($filterCity) {
                $subquery->whereIn('city_id', $filterCity);
            });
        }

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
                break;
            case 4:
                //sort by price desc
                break;
            case 5:
                //sort by rating asc
                break;
            case 6:
                //sort by rating desc
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
            $query->having('review_avg_rating', '>', $filterRating[0]);
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
            'serviceServiceType'
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
}
