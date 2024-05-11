<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Service;
use App\Models\ServiceServiceType;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ServiceServiceTypeController extends Controller
{
    //
    public function staffServiceServiceType()
    {
        $user = Auth::user();

        if ($user->account_role == 'Super Admin') {
            $employee = SuperAdmin::where('account_id', $user->account_id)->first();
        } else {
            $employee = Employee::where('account_id', $user->account_id)->first();
        }

        $serviceServiceTypes = ServiceServiceType::where('service_id', $employee->service_id)
            ->with('serviceType')
            ->get();
        return view('pages.staff.service-service-type', [
            'serviceServiceTypes' => $serviceServiceTypes
        ]);
    }
    public function createServiceServiceType(Request $request)
    {
        $user = Auth::user();

        if ($user->account_role == 'Super Admin') {
            $employee = SuperAdmin::where('account_id', $user->account_id)->first();
        } else {
            $employee = Employee::where('account_id', $user->account_id)->first();
        }

        $this->validate($request, [
            'st_id' => 'required',
            'duration' => 'required|numeric|min:1',
        ]);

        $serviceServiceType = Service::whereHas('serviceServiceType', function ($query) use ($request) {
            $query->where('st_id', '=', $request->st_id);
        })
            ->where('service_id', '=', $employee->service_id)
            ->get();

        if (count($serviceServiceType) > 0) {
            return redirect()->back()->with('alreadyExist', 'Failed to create service service type');
        }

        $employeeServiceType = Employee::where('service_id', '=', $employee->service_id);
        $employeeServiceType = $employeeServiceType->whereHas('employeeServiceType', function ($query) use ($request) {
            $query->where('st_id', '=', $request->st_id);
        })->get();

        if (count($employeeServiceType) < 1) {
            return redirect()->back()->with('needEmployee', 'Failed to create service service type');
        }

        ServiceServiceType::create([
            'service_id' => $employee->service_id,
            'st_id' => $request->st_id,
            'duration' => $request->duration
        ]);

        return redirect()->back()->with('successAdd', 'Service service type created');
    }

    public function deleteServiceServiceType(Request $request)
    {
        $serviceServiceType = ServiceServiceType::find($request->id);
        $serviceServiceType->delete();

        return redirect()->back()->with('successDelete', 'Service service type deleted');
    }
}
