<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function viewHomepage(){
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

        return view('welcome')->with('rec_services',$rec_services);
    }
}
