<?php

namespace App\Http\Controllers;

use App\Models\Employee;
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
}
