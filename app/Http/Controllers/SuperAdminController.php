<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Service;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function createSuperAdmin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | max:25',
            'service_name' => 'required',
            'city' => 'required',
            'email' => 'required | email | unique:account,email',
            'password' => "required | min:8 | confirmed",
            'password_confirmation' => "required"
        ]);

        $service = Service::create([
            'service_name' => $request->service_name,
            'city_id' => $request->city,
            'logo_image_path' => 'logo.jpg',
            'service_image_path' => 'service_image.jpg',
            'is_active' => false,
            'has_faq' => false,
            'has_portfolio' => false,
            'has_promo' => false
        ]);

        Account::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'account_role' => "Super Admin",
            'is_blocked' => false
        ]);

        $acc = Account::where('email', '=', $request->email)->first();

        SuperAdmin::create([
            'account_id' => $acc->account_id,
            'service_id' => $service->service_id,
            'sa_name' => $request->name,
            'sa_image_path' => "saprofile.jpg"
        ]);

        return redirect()->back();
    }
}
