<?php

namespace App\Http\Controllers;

use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function viewSuperAdmins(){
        $admins = SuperAdmin::all();

        return view('viewSuperAdmin')->with('admins', $admins);
    }

    public function viewSuperAdminProfile(){
        $acc_id = Auth::user()->account_id;
        $admin = SuperAdmin::where('account_id','=',$acc_id)->first();

        return view('viewSAProfile')->with('admin', $admin);
    }
}
