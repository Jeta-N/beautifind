<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function login(Request $request){
        // dd($request->password);
        $this->validate($request, [
            'email' =>'required | email',
            'password' =>'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(Auth::check()){
                dd("yes");
            }
            return redirect('/booking');
        }else{
            dd("Failed to login");
        }


    }
}
