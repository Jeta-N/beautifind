<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Booking;
use App\Models\Employee;
use App\Models\EmployeeServiceType;
use App\Models\Review;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function viewEmployees()
    {
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $user = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $user = Employee::where('account_id', '=', $acc_id)->first();
        }

        $employees = Employee::where('service_id', '=', $user->service_id)->get();
        return view('viewEmployee')->with('employees', $employees);
    }

    public function viewEmployeeProfile()
    {
        $acc_id = Auth::user()->account_id;;
        $emp = Employee::where('account_id', '=', $acc_id)->first();

        return view('viewEmpProfile')->with('emp', $emp);
    }

    public function createEmployee(Request $request)
    {
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

    public function deleteBookingSlot(Request $request)
    {
        $emp = Employee::find($request->emp_id);
        foreach ($emp->employeeServiceType as $est) {
            $est->delete();
        }

        $emp->delete();

        return redirect()->back();
    }

    public function staffDashboard()
    {
        $acc_id = Auth::user()->account_id;
        $acc_role = Auth::user()->account_role;

        if ($acc_role == 'Super Admin') {
            $service_id = SuperAdmin::where('account_id', '=', $acc_id)->pluck('service_id');
        } else {
            $service_id = Employee::where('account_id', '=', $acc_id)->pluck('service_id');
        }

        $employees = Employee::where('service_id', '=', $service_id)->get();
        $bookings = Booking::where('service_id', '=', $service_id)
            ->with(
                'user',
                'service',
                'bookingSlot',
                'bookingSlot.employee',
                'serviceType'
            )
            ->get();
        $avg_rating = Review::where('service_id', '=', $service_id)->avg('rating');
        $total_review = Review::where('service_id', '=', $service_id)->count();

        return view(
            'pages.staff.dashboard',
            [
                'employees' => $employees,
                'bookings' => $bookings,
                'avg_rating' => $avg_rating,
                'total_review' => $total_review
            ]
        );
    }

    public function logoutStaff()
    {
        Auth::logout();
        return redirect('/staff-login');
    }
}
