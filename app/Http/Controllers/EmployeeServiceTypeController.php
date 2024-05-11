<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeServiceType;
use App\Models\ServiceType;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeServiceTypeController extends Controller
{
    public function staffEmployeeServiceType(Request $request)
    {
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $user = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $user = Employee::where('account_id', '=', $acc_id)->first();
        }

        $employees = Employee::where('service_id', '=', $user->service_id);

        $employeeServiceType = EmployeeServiceType::whereIn('emp_id', $employees->pluck('emp_id'))->with('serviceType');

        if ($request->name) {
            $employeeServiceType->whereHas('employee', function ($query) use ($request) {
                $query->where('emp_name', 'like', '%' . $request->name . '%');
            });
        }

        $employeeServiceType = $employeeServiceType->get();
        $employees = $employees->get();
        $serviceTypes = ServiceType::all();

        return view('pages.staff.employee-service-type', [
            'employeeServiceTypes' => $employeeServiceType,
            'serviceTypes' => $serviceTypes,
            'employees' => $employees
        ]);
    }

    public function createEmployeeServiceType(Request $request)
    {
        $this->validate($request, [
            'emp_id' => 'required',
            'st_id' => 'required',
            'price' => 'required|numeric|min:10000',
        ]);

        $employeeServiceType = EmployeeServiceType::where('emp_id', '=', $request->emp_id)
            ->where('st_id', '=', $request->st_id)
            ->first();

        if ($employeeServiceType) {
            return redirect()->back()->with('alreadyExist', 'Failed to create employee service type');
        }

        EmployeeServiceType::create([
            'emp_id' => $request->emp_id,
            'st_id' => $request->st_id,
            'price' => $request->price
        ]);

        return redirect()->back()->with('successAdd', 'Employee service type created');
    }

    public function deleteEmployeeServiceType(Request $request)
    {
        $employeeServiceType = EmployeeServiceType::find($request->id);
        $employeeServiceType->delete();

        return redirect()->back()->with('successDelete', 'Employee service type deleted');
    }
}
