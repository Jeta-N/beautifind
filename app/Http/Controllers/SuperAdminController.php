<?php

namespace App\Http\Controllers;

use App\Models\Account;
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

    public function createSuperAdmin(Request $request){
        $this->validate($request, [
            'name' =>'required | max:25',
            'service' =>'required',
            'email' =>'required | email | unique:account,email',
            'password' => "required | min:8 | confirmed",
            'password_confirmation' => "required"
        ]);

        Account::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'account_role' =>"Super Admin",
            'is_blocked' => false
        ]);

        $acc = Account::where('email', '=', $request->email)->first();

        SuperAdmin::create([
            'account_id' => $acc->account_id,
            'service_id' => $request->service,
            'sa_name' => $request->name,
            'sa_image_path' => "saprofile.jpg"
        ]);

        return redirect('/admin-dashboard');
    }
}
