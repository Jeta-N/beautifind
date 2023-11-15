<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function viewBooking(){
        $acc_role = 'User';

        if ($acc_role == 'User'){
            return $this->viewUserBooking();
        }else if ($acc_role == 'Super Admin'){

        }else if($acc_role == 'Manager'){

        }else if ($acc_role == 'Employee'){

        }
    }

    private function viewUserBooking(){
        $acc_id = 1;
        $user = User::where('account_id','=',$acc_id)->first();
        // dd($user);
        $bookings = Booking::where('user_id','=',$user->user_id)->orderBy('booking_status','desc')->get();
        // dd($bookings);
        return view('viewBooking')->with('bookings',$bookings);
    }
}
