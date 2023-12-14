<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function viewUsers(){
        $users = User::all();

        return view('viewUser')->with('users', $users);
    }

    public function viewUserProfile(){
        $acc_id = Auth::user()->account_id;
        $user = User::where('account_id','=',$acc_id)->first();

        return view('viewUserProfile')->with('user', $user);
    }

    public function register(Request $request){
        $this->validate($request, [
            'name' =>'required | max:25',
            'city' =>'required',
            'reg_email' =>'required | email | unique:account,email',
            'reg_password' => "required | min:8 | confirmed",
            'reg_password_confirmation' => "required"
        ]);

        Account::insert([
            'email' => $request->reg_email,
            'password' => bcrypt($request->reg_password),
            'account_role' =>"User",
            'is_blocked' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $acc = Account::where('email', '=', $request->reg_email)->first();

        User::insert([
            'account_id' => $acc->account_id,
            'user_name' => $request->name,
            'user_gender' => null,
            'user_birthdate' => null,
            'user_phone_number' => null,
            'city_id' => $request->city,
            'user_image_path' => "userprofile.jpg",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/');
    }
}
