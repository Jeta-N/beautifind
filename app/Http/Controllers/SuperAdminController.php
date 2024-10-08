<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Service;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SuperAdminController extends Controller
{
    public function createSuperAdmin(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required | max:25',
                'service_name' => 'required',
                'city' => 'required',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('account', 'email')->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    }),
                ],
                'password' => "required | min:8 | confirmed",
                'password_confirmation' => "required"
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        };


        $service = Service::create([
            'service_name' => $request->service_name,
            'city_id' => $request->city,
            'logo_image_path' => 'default.png',
            'service_image_path' => 'default.jpg',
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
            'sa_image_path' => "default-user.svg"
        ]);

        return redirect()->back()->with('successAddService', 'successAddService');
    }
}
