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
}
