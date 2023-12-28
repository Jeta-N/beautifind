<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use App\Models\UserSecurityQuestion;
use App\Models\UserServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view('viewUserProfile')->with('user', $user);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | min:2',
            'city' => 'required',
            'reg_email' => 'required | email | unique:account,email',
            'reg_password' => 'required | min:8 | confirmed',
            'reg_password_confirmation' => 'required',
            'typePreferences' => 'required',
            'question' => 'required',
            'answer' => 'required | min:3 | max:25',
        ]);

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

        return redirect('/');
    }

    public function deleteUser(Request $request){
        $user = User::find($request->user_id);
        $acc = Account::find($user->acc_id);
        foreach($user->userServiceType as $ust){
            $ust->delete();
        }
        $user->delete();
        $acc->delete();

        return redirect()->back();
    }
}
