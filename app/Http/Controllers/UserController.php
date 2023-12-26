<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Booking;
use App\Models\User;
use App\Models\UserServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function viewUsers()
    {
        $users = User::all();

        return view('viewUser')->with('users', $users);
    }

    public function viewUserProfile()
    {
        $acc_id = Auth::user()->account_id;
        $user = User::where('account_id', '=', $acc_id)->first();
        $user->with('account');

        $userServiceType = UserServiceType::where('user_id', '=', $user->user_id)->pluck('st_id')
            ->toArray();;

        return view('pages.profile', [
            'user' => $user,
            'userServiceTypes' => $userServiceType
        ]);
    }

    public function register(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required | min:2',
                'city' => 'required',
                'reg_email' => 'required | email | unique:account,email',
                'reg_password' => "required | min:8 | confirmed",
                'reg_password_confirmation' => "required",
                'typePreferences' => 'required'
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->with('failedRegister', 'Failed to register')->withErrors($e->errors())->withInput();
        }

        $account = Account::create([
            'email' => $request->reg_email,
            'password' => bcrypt($request->reg_password),
            'account_role' => "User",
            'is_blocked' => false
        ]);

        $user = $account->user()->create([
            'user_name' => $request->name,
            'city_id' => $request->city,
            'user_image_path' => "userprofile.jpg"
        ]);

        if ($user) {
            $serviceTypeIds = $request->typePreferences;

            foreach ($serviceTypeIds as $serviceTypeId) {
                UserServiceType::create([
                    'user_id' => $user->user_id,
                    'st_id' => $serviceTypeId
                ]);
            }
        } else {
            return redirect()->back()->with('error', 'Failed to register');
        }

        return redirect('/');
    }

    public function editProfile(Request $request)
    {
        $day = $request->input('date');
        $month = $request->input('month');
        $year = $request->input('year');
        $username = $request->input('username');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $phoneNumber = $request->input('phoneNumber');

        $this->validate($request, [
            'email' => 'required|email',
            'username'  => 'required|min:2',
            'gender' => 'required',
            'city' => 'required',
            'phoneNumber' => 'required',
            'date' => 'required|numeric|min:1|max:31',
            'month' => 'required|numeric|min:1|max:12',
            'year' => 'required|numeric|min:1900',
        ]);

        $birthdate = $year . '-' . $month . '-' . $day;

        $user = User::where('account_id', '=', Auth::user()->account_id)->first();
        $user->user_birthdate = $birthdate;
        $user->user_gender = $gender;
        $user->user_name = $username;
        $user->account->email = $email;
        $user->user_phone_number = $phoneNumber;
        $user->updated_at = now();
        $user->account->updated_at = now();
        $user->save();

        return redirect()->back()->with('successEditProfile', 'Successfully edit profile');
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
        $user->account->save();

        return redirect()->back()->with('successChangePassword', 'Successfully change password');
    }

    public function editPreferences(Request $request)
    {
        $this->validate($request, [
            'preference' => 'required'
        ]);

        $user = User::where('account_id', '=', Auth::user()->account_id)->first();
        $userServiceType = UserServiceType::where('user_id', '=', $user->user_id)->get();

        foreach ($userServiceType as $ust) {
            $ust->delete();
        }

        $serviceTypeIds = $request->preference;
        foreach ($serviceTypeIds as $serviceTypeId) {
            UserServiceType::create([
                'user_id' => $user->user_id,
                'st_id' => $serviceTypeId
            ]);
        }
    }
}
