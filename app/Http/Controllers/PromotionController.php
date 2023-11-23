<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Promotion;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function viewPromotions(){
        $acc_role = 'Super Admin';
        if ($acc_role == 'Super Admin'){
            $user = SuperAdmin::where('account_id','=',2)->first();
        }else{
            $user = Employee::where('account_id','=',3)->first();
        }

        $promos = Promotion::where('service_id', '=', $user->service_id)->get();

        return view('viewPromo')->with('promos', $promos);
    }
}
