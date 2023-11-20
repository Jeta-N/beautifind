<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function viewEmployees(){
        $acc_role = 'Super Admin';
        if ($acc_role == 'Super Admin'){
            $user = SuperAdmin::where('account_id','=',2)->first();
        }else{
            $user = Employee::where('account_id','=',3)->first();
        }

        $employees = Employee::where('service_id', '=', $user->service_id)->get();
        return view('viewEmployee')->with('employees',$employees);
    }
}
