<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Booking;
use App\Models\Employee;
use App\Models\Service;
use App\Models\SuperAdmin;
use App\Models\User;
use App\Models\UserSecurityQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $user = Account::where('email', '=', $request->email)->first();
        if ($user != null && $user->is_blocked == true) {
            return redirect()->back()->with('failedLoginBlocked', 'failed login');
        }
        if ($user != null && $user->account_role != "User") {
            return redirect()->back()->with('failedLogin', 'failed login');
        } else if (Auth::attempt($credentials)) {
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

    public function viewForgotPassword()
    {
        return view('pages.forgot-password');
    }

    public function checkEmail(Request $request)
    {
        $account = Account::where('email', '=', $request->email)->first();

        if ($account == null) {
            return response()->json(404);
        } else {
            $securityQuestion = UserSecurityQuestion::where('user_id', '=', $account->user->user_id)
                ->with('securityQuestion')
                ->first();

            return response()->json(['securityQuestion' => $securityQuestion, 'account' => $account]);
        }
    }

    public function checkAnswer(Request $request)
    {
        $user = User::where('user_id', '=', $request->user_id)->first();
        $account = Account::where('account_id', '=', $user->account_id)->first();
        $userSecurityQuestion = UserSecurityQuestion::where('user_id', '=', $request->user_id)->first();
        if ($userSecurityQuestion->sq_answer == $request->answer) {
            return response()->json(['account' => $account]);
        } else {
            return response()->json(404);
        }
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

        return redirect()->back()->with('successBlockAccount', $acc->is_blocked ? 'Successfully blocked account' : 'Successfully unblocked account');
    }

    public function editPassword(Request $request)
    {
        try {
            $this->validate($request, [
                'new_password'  => 'required|min:8',
                'confirm_password' => 'required|same:new_password',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        };

        $account = Account::where('account_id', '=', $request->acc_id)->first();
        $account->password = bcrypt($request->new_password);
        $account->updated_at = now();
        $account->save();

        return redirect('/')->with('successChangePassword', 'Successfully change password');
    }

    public function changePassword(Request $request)
    {
        try {
            $this->validate($request, [
                'old_password' => 'required',
                'new_password'  => 'required|min:8',
                'confirm_password' => 'required|same:new_password',
            ]);
        } catch (ValidationException $e) {
            $errors = $e->errors();
            if (!($errors instanceof MessageBag)) {
                $errors = new MessageBag($errors);
            }
            $errors->add('validation_scenario', 'changePassword');
            return redirect()->back()->withErrors($errors)->withInput();
        };

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('errorPassword', 'Current password is incorrect');
        }

        $user = Account::where('account_id', '=', Auth::user()->account_id)->first();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('successChangePassword', 'Successfully change password');
    }

    public function changeEmployeePassword(Request $request)
    {
        try {
            $this->validate($request, [
                'new_password'  => 'required|min:8',
                'confirm_password' => 'required|same:new_password',
            ]);
        } catch (ValidationException $e) {
            $errors = $e->errors();
            if (!($errors instanceof MessageBag)) {
                $errors = new MessageBag($errors);
            }
            $errors->add('validation_scenario', 'changePassword');
            return redirect()->back()->withErrors($errors)->withInput();
        };

        $employee = Employee::where('emp_id', '=', $request->id)->first();
        $account = Account::where('account_id', '=', $employee->account_id)->first();
        $account->password = bcrypt($request->new_password);
        $account->updated_at = now();
        $account->save();

        return redirect()->back()->with('successChangePassword', 'Successfully change password');
    }

    public function changeSuperAdminPassword(Request $request)
    {
        try {
            $this->validate($request, [
                'new_password'  => 'required|min:8',
                'confirm_password' => 'required|same:new_password',
            ]);;
        } catch (ValidationException $e) {
            $errors = $e->errors();
            if (!($errors instanceof MessageBag)) {
                $errors = new MessageBag($errors);
            }
            $errors->add('validation_scenario', 'changeAdminPassword');
            return redirect()->back()->withErrors($errors)->withInput();
        };

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
        } else if (Auth::attempt(['email' => $request->email, 'password' => $request->password,  'is_blocked' => true])) {
            return redirect()->back()->with('failedLoginBlocked', 'failed login');
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
