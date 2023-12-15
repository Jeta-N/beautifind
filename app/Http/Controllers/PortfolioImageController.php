<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PortfolioImage;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioImageController extends Controller
{
    public function viewPortfolios(){
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin'){
            $user = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $user = Employee::where('account_id','=',$acc_id)->first();
        }

        $ports = PortfolioImage::where('service_id', '=', $user->service_id)->get();

        return view('viewPorts')->with('ports', $ports);
    }
}
