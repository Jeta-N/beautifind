<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Employee;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function viewBooking(Request $request){
        $acc_role = 'Staff';

        if ($acc_role == 'User'){
            return $this->viewUserBooking();
        }else if ($acc_role == 'Super Admin' || $acc_role == 'Manager'){
            return $this->viewServiceBooking($acc_role);
        }else if ($acc_role == 'Staff'){
            return $this->viewStaffBooking();
        }
    }

    private function viewUserBooking(){
        $acc_id = 1;
        $title = 'user bookings';
        $user = User::where('account_id','=',$acc_id)->first();
        // dd($user);
        $bookings = Booking::where('user_id','=',$user->user_id)->orderBy('booking_status','desc')->get();
        // dd($bookings);
        return view('viewBooking')->with('bookings',$bookings)->with('title',$title);
    }

    private function viewServiceBooking($acc_role){
        $acc_id = 3;
        $title = 'service bookings';
        $user = null;
        if ($acc_role == 'Super Admin'){
            $user = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $user = Employee::where('account_id','=',$acc_id)->first();
        }
        // dd($user);
        $bookings = Booking::where('service_id','=',$user->service_id)->orderBy('booking_status','desc')->get();
        // dd($bookings);
        return view('viewBooking')->with('bookings',$bookings)->with('title',$title);
    }

    private function viewStaffBooking(){
        $acc_id = 4;
        $title = 'staff bookings';
        $user = Employee::where('account_id','=',$acc_id)->first();
        // dd($user);
        $bookings = Booking::where('booking.service_id','=',$user->service_id)
        ->join('booking_slot','booking.bs_id','=', 'booking_slot.bs_id')
        ->where('booking_slot.emp_id','=',$user->emp_id)
        ->orderBy('booking.booking_status','desc')->get();
        // dd($bookings);
        return view('viewBooking')->with('bookings',$bookings)->with('title',$title);
    }
}
