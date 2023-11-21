<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceServiceType;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function viewHomePage(){
        $rec_services = [];
        if (TRUE){
            $rec_services = $this->rec_service();
        }
        $services = $this->servicesByType();
        return view('welcome')->with('rec_services',$rec_services)->with('services',$services);
    }

    private function rec_service(){
        $user = User::find(1);
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
                    if($sst->service->service_city == $user->user_city && $sst->service->service_status == 'Active'){
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
        $service_types = [2,4];
        // $service_types = null;
        if($service_types == null){
            $services = Service::all();
        }else {
            $services_id = ServiceServiceType::whereIn('st_id',$service_types)->select('service_id')->distinct()->get();
            $services = Service::whereIn('service_id',$services_id)->get();
        }
        return view('viewServices')->with('services',$services);
    }

    public function viewServicesDetails(Request $request){
        $service_id = $request->route('id');
        $service = Service::find($service_id);

        return view('viewServiceDetails')->with('service',$service);
    }
}
