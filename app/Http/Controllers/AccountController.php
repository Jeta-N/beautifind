<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Booking;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use App\Models\UserSecurityQuestion;
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
            return redirect()->back();
        }else{
            dd("Failed to login");
        }


    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function viewDashboard(){
        $user_count = User::count();
        $service_count = Service::count();
        $booking_count = Booking::count();
        $review_count = Review::count();
        // dd($review_count);
        return view('pages.admin.dashboard')->with('user_count', $user_count)->with('service_count', $service_count)->with('booking_count', $booking_count)->with('review_count', $review_count);
    }

    public function blockAccount(Request $request){
        $acc = Account::find($request->acc_id);
        $acc->is_blocked = true;
        $acc->save();

        return redirect()->back();
    }

    public function changePassword(Request $request){
        $this->validate($request, [
            'old_password' => 'required |current_password | min:5 | max:20',
            'new_password' => 'required | min:8',
            'new_password_confirmation' => 'required'
        ]);

        $acc = Account::find(Auth::user()->acc_id);
        $acc->password = bcrypt($request->new_password);
        $acc->save();

        return redirect('/');
    }

    public function getSecurityQuestion(Request $request){
        $acc = Account::where('email', '=', $request->email)->first();
        $user = User::where('account_id', '=', $acc->account_id)->first();

        $usq = UserSecurityQuestion::where('user_id', '=', $user->user_id)->first();

        return view('')->with('usq', $usq);
    }

    public function updateForgetPassword(Request $request){
        $this->validate($request, [
            'answer' => 'required',
            'password' => 'required | min:8',
            'password_confirmation' => 'required'
        ]);

        $acc = Account::where('email', '=', $request->email)->first();
        $user = User::where('account_id', '=', $acc->account_id)->first();

        $usq = UserSecurityQuestion::where('user_id', '=', $user->user_id)->first();

        if (strcasecmp($request->answer, $usq->sq_answer) != 0){
            return redirect()->back()->with('error', 'Incorrect Answer');
        }

        $acc->password = bcrypt($request->password);
        $acc->save();

        return view('')->with('usq', $usq);
    }

}
