<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewUsers(){
        $users = User::all();

        return view('viewUser')->with('users', $users);
    }

    public function viewUserProfile(){
        $acc_id = 1;
        $user = User::where('account_id','=',$acc_id)->first();

        return view('viewUserProfile')->with('user', $user);
    }
}
