<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Booking;
use App\Models\Employee;
use App\Models\Review;
use App\Models\Service;
use App\Models\SuperAdmin;
use App\Models\User;
use App\Models\UserSecurityQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->password);
        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->back();
        } else {
            return redirect()->back()->with('failedLogin', 'failed login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function adminDashboard()
    {
        if (Auth::user()->account_role != 'Website Manager') {
            return view('pages.staff.login');
        }

        $users = User::with('account')->get();
        $services = Service::with('superAdmin')->get();
        $employees = Employee::count();
        $bookings = Booking::count();

        return view(
            'pages.admin.dashboard',
            [
                'users' => $users,
                'bookings' => $bookings,
                'services' => $services,
                'employees' => $employees
            ]
        );
    }

    public function blockAccount(Request $request)
    {
        if (Auth::user()->account_role != 'Website Manager') {
            return view('pages.staff.login');
        }

        $acc = Account::find($request->id);
        $acc->is_blocked = !$acc->is_blocked;
        $acc->updated_at = now();
        $acc->save();

        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password'  => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        if (bcrypt($request->old_password) != Auth::user()->password) {
            return redirect()->back()->with('errorPassword', 'Current password is incorrect');
        }
        $user = Account::where('account_id', '=', Auth::user()->account_id)->first();
        $user->account->password = bcrypt($request->new_password);
        $user->updated_at = now();
        $user->account->save();

        return redirect()->back()->with('successChangePassword', 'Successfully change password');
    }

    public function changeEmployeePassword(Request $request)
    {
        $this->validate($request, [
            'new_password'  => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);
        $employee = Employee::where('emp_id', '=', $request->id)->first();
        $account = Account::where('account_id', '=', $employee->account_id)->first();
        $account->password = bcrypt($request->new_password);
        $account->updated_at = now();
        $account->save();

        return redirect()->back()->with('successChangePassword', 'Successfully change password');
    }

    public function changeSuperAdminPassword(Request $request)
    {
        $this->validate($request, [
            'new_password'  => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);
        $admin = SuperAdmin::where('sa_id', '=', $request->id)->first();
        $account = Account::where('account_id', '=', $admin->account_id)->first();
        $account->password = bcrypt($request->new_password);
        $account->updated_at = now();
        $account->save();

        return redirect()->back()->with('successChangePassword', 'Successfully change password');
    }

    public function changeUserPassword(Request $request)
    {
        $this->validate($request, [
            'new_password'  => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = User::where('user_id', '=', $request->id)->first();
        $account = Account::where('account_id', '=', $user->account_id)->first();
        $account->password = bcrypt($request->new_password);
        $account->updated_at = now();
        $account->save();

        return redirect()->back()->with('successChangePassword', 'Successfully change password');
    }

    public function getSecurityQuestion(Request $request)
    {
        $acc = Account::where('email', '=', $request->email)->first();
        $user = User::where('account_id', '=', $acc->account_id)->first();

        $usq = UserSecurityQuestion::where('user_id', '=', $user->user_id)->first();

        return view('')->with('usq', $usq);
    }

    public function updateForgetPassword(Request $request)
    {
        $this->validate($request, [
            'answer' => 'required',
            'password' => 'required | min:8',
            'password_confirmation' => 'required'
        ]);

        $acc = Account::where('email', '=', $request->email)->first();
        $user = User::where('account_id', '=', $acc->account_id)->first();

        $usq = UserSecurityQuestion::where('user_id', '=', $user->user_id)->first();

        if (strcasecmp($request->answer, $usq->sq_answer) != 0) {
            return redirect()->back()->with('error', 'Incorrect Answer');
        }

        $acc->password = bcrypt($request->password);
        $acc->save();

        return view('')->with('usq', $usq);
    }

    // Staff
    public function viewLoginStaff()
    {
        return view('pages.staff.login');
    }

    public function loginStaff(Request $request)
    {
        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'account_role' => ['Manager', 'Super Admin'], 'is_blocked' => false])) {
            $request->session()->regenerate();
            return redirect('/staff-dashboard');
        } else if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'account_role' => ['Staff'], 'is_blocked' => false])) {
            $request->session()->regenerate();
            return redirect('/staff-booking');
        } else if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'account_role' => ['Website Manager'], 'is_blocked' => false])) {
            $request->session()->regenerate();
            return redirect('/admin-dashboard');
        } else {
            return redirect()->back()->with('failedLogin', 'failed login');
        }
    }

    public function updateRole(Request $request)
    {
        $employee = Employee::where('emp_id', $request->id)->first();
        $account = Account::where('account_id', $employee->account_id)->first();

        $account->account_role = $request->role;
        $account->save();

        return redirect()->back()->with('successChangeRole', 'Successfully change role');
    }
}
