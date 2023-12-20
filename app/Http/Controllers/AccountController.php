<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->password);
        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->back();
        } else {
            dd("Failed to login");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function viewDashboard()
    {
        $user_count = User::count();
        $service_count = Service::count();
        $booking_count = Booking::count();
        $review_count = Review::count();
        // dd($review_count);
        return view('pages.admin.dashboard')->with('user_count', $user_count)->with('service_count', $service_count)->with('booking_count', $booking_count)->with('review_count', $review_count);
    }
}
