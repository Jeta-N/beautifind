<?php

namespace App\Http\Controllers;

use App\Models\BookingSlot;
use App\Models\Employee;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;

class BookingSlotController extends Controller
{
    public function viewBookingSlots(){
        $acc_role = 'Super Admin';
        if ($acc_role == 'Super Admin'){
            $user = SuperAdmin::where('account_id','=',2)->first();
        }else{
            $user = Employee::where('account_id','=',3)->first();
        }

        $booking_slots = BookingSlot::where('service_id', '=', $user->service_id)->get();
        return view('viewBookingSlot')->with('booking_slots',$booking_slots);
    }
}
