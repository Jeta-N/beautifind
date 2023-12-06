<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function login(Request $request){
        dd($request);
        $this->validate($request, [
            'email' =>'required | email',
            'password' =>'required'
        ]);
    }
}
