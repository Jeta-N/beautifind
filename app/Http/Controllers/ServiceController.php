<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\PortfolioImage;
use App\Models\Promotion;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceServiceType;
use App\Models\User;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function viewHomePage(){
        $rec_services = [];
        if (Auth::check()){
            $rec_services = $this->rec_service();
        }
        $services = $this->servicesByType();
        return view('welcome')->with('rec_services',$rec_services)->with('services',$services);
    }

    private function rec_service(){
        $acc_id = Auth::user()->account_id;
        $user = User::where('account_id','=',$acc_id)->first();
        // dd($user);
        $service_score = [];
        $service_types = [];

        foreach($user->userServiceType as $ust){
            $service_types[] = $ust->serviceType;
        }
        // dd($service_types);
        foreach($service_types as $st){
            foreach($st->serviceServiceType as $sst){
                if(isset($service_score[$sst->service_id])){
                    $service_score[$sst->service_id] += 1;
                }else{
                    if($sst->service->city_id == $user->city_id && $sst->service->service_status == 'Active'){
                        $service_score[$sst->service_id] = 1;
                    }
                }
            }
        }
        // arsort($service_score);
        // dd($service_score);
        // $recommender = array_keys(array_slice($service_score,0,3,true));
        $recommender = array_rand($service_score,3);
        // dd($recommender);
        $rec_services = [];

        foreach($recommender as $rec){
            $rec_services[] = Service::find($rec);
        }

        // dd($rec_services);

        return $rec_services;
    }

    private function servicesByType(){
        $st = 1;
        $sst_array = ServiceServiceType::where('st_id','=',$st)->inRandomOrder()->limit(2)->get();
        $services = [];
        foreach($sst_array as $sst){
            $services[] = Service::find($sst->service_id);
        }

        return $services;
    }

    public function viewServicesList(Request $request){
        $services = null;
        // $service_types = [2,4];
        $service_types = null;
        if($service_types == null){
            $services = Service::orderBy('service_name')->get();
        }else {
            $services_id = ServiceServiceType::whereIn('st_id',$service_types)->select('service_id')->distinct()->get();
            $ratings = DB::table('review')->select('service_id',DB::raw('AVG(rating) as rating'))->groupBy('service_id');
            // dd($ratings);
            $services = Service::whereIn('service.service_id',$services_id)
            ->leftJoinSub($ratings,'ratings', function (JoinClause $join){
                $join->on('service.service_id','=','ratings.service_id');
            })
            ->select(DB::raw('service.*,ratings.rating'))
            ->get();

            // dd($services);
        }
        return view('viewServices')->with('services',$services);
    }

    public function viewServicesDetails(Request $request){
        $service_id = $request->route('id');
        $service = Service::find($service_id);

        $faqs= Faq::where('service_id','=',$service_id)->get();
        $ports = PortfolioImage::where('service_id','=',$service_id)->get();
        $promos = Promotion::where('service_id','=',$service_id)->get();

        return view('viewServiceDetails')->with('service',$service)->with('faqs',$faqs)->with('ports',$ports)->with('promos',$promos);
    }
}
