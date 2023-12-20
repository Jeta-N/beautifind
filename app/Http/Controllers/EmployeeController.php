<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Employee;
use App\Models\EmployeeServiceType;
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

    public function createEmployee(Request $request){
        $this->validate($request, [
            'emp_name' => 'required | min:2',
            'emp_gender' => 'required',
            'emp_birthdate' => 'required',
            'emp_phone_number' => 'required',
            'account_role' => 'required',
            'email' => 'required | email | unique:account,email',
            'password' => 'required | min:8 | confirmed',
            'password_confirmation' => 'required',
            'emp_stype' => 'required'
        ]);

        $account = Account::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'account_role' => $request->account_role,
            'is_blocked' => false
        ]);

        $employee = $account->employee()->create([
            'emp_name' => $request->emp_name,
            'emp_gender' => $request->emp_gender,
            'emp_birthdate' => $request->emp_birthdate,
            'emp_phone_number' => $request->emp_phone_number,
            'emp_image_path' => "employeeprofile.jpg"
        ]);

        if ($employee) {
            $serviceTypeIds = $request->emp_stype;

            foreach ($serviceTypeIds as $serviceTypeId) {
                EmployeeServiceType::create([
                    'emp_id' => $employee->emp_id,
                    'st_id' => $serviceTypeId
                ]);
            }
        } else {
            return redirect()->back()->with('error', 'Failed to register');
        }

        return redirect('/');
    }
}
