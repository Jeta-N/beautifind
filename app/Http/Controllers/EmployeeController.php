<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Booking;
use App\Models\Employee;
use App\Models\Review;
use App\Models\Service;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function viewEmployeeProfile(Request $request)
    {
        $emp = Employee::where('emp_id', '=', $request->id)
            ->with('employeeServiceType')
            ->with('employeeServiceType.serviceType')
            ->with('account')
            ->first();

        $bookings = Booking::whereHas('bookingSlot', function ($query) use ($request) {
            $query->where('emp_id', '=', $request->id);
        })->get();

        return view('pages.staff.employee-profile', [
            'employee' => $emp,
            'bookings' => $bookings
        ]);
    }

    public function createEmployee(Request $request)
    {
        $this->validate($request, [
            'emp_name' => 'required | min:2',
            'emp_gender' => 'required',
            'date' => 'required|numeric|min:1|max:31',
            'month' => 'required|numeric|min:1|max:12',
            'year' => 'required|numeric|min:1900',
            'emp_phone_number' => 'required',
            'account_role' => 'required',
            'email' => 'required | email | unique:account,email',
            'password' => 'required | min:8 | confirmed',
            'password_confirmation' => 'required'
        ]);


        $acc_id = Auth::user()->account_id;
        $service_id = SuperAdmin::where('account_id', '=', $acc_id)->pluck('service_id')->first();
        $birthdate = $request->year . '-' . $request->month . '-' . $request->date;

        $account = Account::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'account_role' => $request->account_role,
            'is_blocked' => false
        ]);

        $account->employee()->create([
            'emp_name' => $request->emp_name,
            'service_id' => $service_id,
            'emp_gender' => $request->emp_gender,
            'emp_birthdate' => $birthdate,
            'emp_phone_number' => $request->emp_phone_number,
            'emp_image_path' => "employeeprofile.jpg"
        ]);

        return redirect()->back();
    }

    public function deleteEmployee(Request $request)
    {
        $emp = Employee::find($request->id);
        $acc = Account::find($emp->account_id);
        foreach ($emp->employeeServiceType as $est) {
            $est->delete();
        }

        $emp->delete();
        $acc->delete();

        return redirect()->back()->with('successDeleteEmployee', 'Successfully delete employee');
    }

    public function staffProfile()
    {
        $acc_id = Auth::user()->account_id;
        $employee = Employee::where('account_id', '=', $acc_id)->with('service')->first();

        return view('pages.staff.staff-profile')->with('employee', $employee);
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

    public function staffEmployees(Request $request)
    {
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $user = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $user = Employee::where('account_id', '=', $acc_id)->first();
        }
        $employees = Employee::where('service_id', '=', $user->service_id)->with('account');

        if ($request->name) {
            $employees->where('emp_name', 'like', '%' . $request->name . '%');
        }
        $employees = $employees->get();

        return view('pages.staff.employee', [
            'employees' => $employees
        ]);
    }

    public function logoutStaff()
    {
        Auth::logout();
        return redirect('/staff-login');
    }

    public function updateStaffProfile(Request $request)
    {
        $this->validate($request, [
            'username' => 'required | min:2',
            'gender' => 'required',
            'date' => 'required|numeric|min:1|max:31',
            'month' => 'required|numeric|min:1|max:12',
            'year' => 'required|numeric|min:1900',
            'phone_number' => 'required',
            'email' => [
                'email',
                Rule::unique('account', 'email')->ignore(Auth::user())
            ]
        ]);

        $acc_id = Auth::user()->account_id;
        $employee = Employee::where('account_id', '=', $acc_id)->first();

        $employee->emp_name = $request->username;
        $employee->account->email = $request->email;
        $employee->emp_phone_number = $request->phone_number;

        $birthdate = $request->year . '-' . $request->month . '-' . $request->date;
        $employee->emp_birthdate = $birthdate;
        $employee->emp_gender = $request->gender;

        if ($request->profile_picture) {
            $file = $request->file('profile_picture');
            $profilePictureName = $employee->emp_id . '_profile_image_' . time() . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/asset/images/profile-picture', $file, $profilePictureName);

            $employee->emp_image_path = $profilePictureName;
        }
        $employee->save();
        return redirect()->back()->with('successEditProfile', 'Successfully updated profile');
    }

    public function adminEmployees(Request $request)
    {
        $employees = Employee::with('account', 'service');

        if ($request->name) {
            $employees->where('emp_name', 'like', '%' . $request->name . '%');
        }

        if ($request->service) {
            $employees->where('service_id', '=', $request->service);
        }

        $employees = $employees->get();
        $servicesName = Service::pluck('service_name');

        $superAdmins = SuperAdmin::with('account', 'service');
        if ($request->name) {
            $superAdmins->where('sa_name', 'like', '%' . $request->name . '%');
        }

        if ($request->service) {
            $superAdmins->where('service_id', '=', $request->service);
        }

        $superAdmins = $superAdmins->get();

        return view('pages.admin.employee', [
            'employees' => $employees,
            'servicesName' => $servicesName,
            'superAdmins' => $superAdmins
        ]);
    }
}
