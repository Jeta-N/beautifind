<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function viewEmployees(){
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin'){
            $user = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $user = Employee::where('account_id','=',$acc_id)->first();
        }

        $employees = Employee::where('service_id', '=', $user->service_id)->get();
        return view('viewEmployee')->with('employees',$employees);
    }

    public function viewEmployeeProfile(){
        $acc_id = Auth::user()->account_id;;
        $emp = Employee::where('account_id','=',$acc_id)->first();

        return view('viewEmpProfile')->with('emp',$emp);
    }
}
