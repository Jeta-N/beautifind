<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Booking;
use App\Models\User;
use App\Models\UserSecurityQuestion;
use App\Models\UserServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function adminUsers(Request $request)
    {
        $users = User::query();

        if ($request->name) {
            $users->where('user_name', 'like', '%' . $request->name . '%');
        }

        $users = $users->with('account')->get();
        return view('pages.admin.users')->with('users', $users);
    }

    public function viewProfile()
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
                'register_email' => [
                    'required',
                    'email',
                    Rule::unique('account', 'email')->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    }),
                ],
                'register_password' => 'required | min:8 | confirmed',
                'register_password_confirmation' => 'required',
                'typePreferences' => 'required',
                'question' => 'required',
                'answer' => 'required | min:3 | max:50',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->with('failedRegister', 'Failed to register')->withErrors($e->errors())->withInput();
        }

        $account = Account::create([
            'email' => $request->register_email,
            'password' => bcrypt($request->register_password),
            'account_role' => "User",
            'is_blocked' => false
        ]);

        $user = $account->user()->create([
            'user_name' => $request->name,
            'city_id' => $request->city,
            'user_image_path' => "default-user.svg"
        ]);

        UserSecurityQuestion::create([
            'user_id' => $user->user_id,
            'sq_id' => $request->question,
            'sq_answer' => $request->answer
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

        return redirect()->back()->with('successRegister', 'Successfully registered');
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
            'email' => [
                'email',
                'required',
                Rule::unique('account', 'email')->ignore(Auth::user())->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ],
            'username'  => 'required|min:2',
            'gender' => 'required',
            'city' => 'required',
            'phoneNumber' => 'required|min:10|max:13',
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

        if ($request->profile_picture) {
            $file = $request->file('profile_picture');
            $profilePictureName = $user->user_id . 'user_profile_image_' . time() . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/asset/images/profile-picture', $file, $profilePictureName);

            $user->user_image_path = $profilePictureName;
        }

        $user->save();

        return redirect()->back()->with('successEditProfile', 'Successfully edit profile');
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

        return redirect()->back()->with('successEditPreference', 'Successfully edit preferences');
    }

    public function viewUserProfile(Request $request)
    {
        $user = User::where('user_id', '=', $request->id)
            ->with('userServiceType')
            ->with('userServiceType.serviceType')
            ->with('account')
            ->first();

        return view('pages.admin.user-profile')->with('user', $user);
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        $acc = Account::find($user->account_id);
        foreach ($user->userServiceType as $ust) {
            $ust->delete();
        }
        $user->delete();
        $acc->delete();

        return redirect()->back()->with('successDeleteUser', 'Successfully deleted user');
    }
}
