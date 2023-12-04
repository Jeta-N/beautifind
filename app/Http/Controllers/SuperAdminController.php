<?php

namespace App\Http\Controllers;

use App\Models\SuperAdmin;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function viewSuperAdmins(){
        $admins = SuperAdmin::all();

        return view('viewSuperAdmin')->with('admins', $admins);
    }

    public function viewSuperAdminProfile(){
        $acc_id = 2;
        $admin = SuperAdmin::where('account_id','=',$acc_id)->first();

        return view('viewSAProfile')->with('admin', $admin);
    }
}
