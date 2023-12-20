<?php

namespace App\Http\Controllers;

use App\Models\BookingSlot;
use App\Models\Employee;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingSlotController extends Controller
{
    public function viewBookingSlots(){
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin'){
            $user = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $user = Employee::where('account_id','=',$acc_id)->first();
        }

        $booking_slots = BookingSlot::where('service_id', '=', $user->service_id)->get();
        return view('viewBookingSlot')->with('booking_slots',$booking_slots);
    }

    public function createBookingSlot(Request $request){
        $this->validate($request, [
            'emp_id' =>'required',
            'time_start' =>'required'
        ]);
    }
}
