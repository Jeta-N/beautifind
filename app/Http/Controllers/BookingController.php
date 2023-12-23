<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingSlot;
use App\Models\Employee;
use App\Models\EmployeeServiceType;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function viewBooking(Request $request){
        $acc_role = Auth::user()->account_role;

        if ($acc_role == 'User'){
            return $this->viewUserBooking();
        }else if ($acc_role == 'Super Admin' || $acc_role == 'Manager'){
            return $this->viewServiceBooking($acc_role);
        }else if ($acc_role == 'Staff'){
            return $this->viewStaffBooking();
        }
    }

    private function viewUserBooking(){
        $acc_id = Auth::user()->account_id;
        $title = 'user bookings';
        $user = User::where('account_id','=',$acc_id)->first();
        $bookings = Booking::where('user_id','=',$user->user_id)->orderBy('booking_status','desc')->get();
        return view('viewBooking')->with('bookings',$bookings)->with('title',$title);
    }

    private function viewServiceBooking($acc_role){
        $acc_id = Auth::user()->account_id;
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
        $acc_id = Auth::user()->account_id;
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

    public function createBooking(Request $request){
        $user_id = Auth::user()->user_id;
        $this->validate($request, [
            'st_id' =>'required',
            'bs_id' =>'required'
        ]);

        $slot = BookingSlot::find($request->bs_id);
        $service_id = $slot->service_id;
        $est = EmployeeServiceType::where('emp_id', '=', $slot->emp_id)->where('st_id', '=', $request->st_id)->first();
        $price = $est->price;

        Booking::create([
            'user_id' => $user_id,
            'st_id' => $request->st_id,
            'bs_id' => $request->bs_id,
            'service_id' => $service_id,
            'price' => $price,
            'booking_status' => 'Upcoming'
        ]);

        $slot = BookingSlot::find($request->bs_id);
        $slot->is_available = false;
        $slot->save();

        return redirect('/booking');
    }

    public function updateBookingStatus(Request $request){
        $booking = Booking::find($request->booking_id);
        $booking->status = $request->status;
        $booking->save();

        if($request->status == 'Cancelled'){
            $slot = BookingSlot::find($booking->bs_id);
            $slot->is_available = true;
            $slot->save();
        }

        return redirect('/booking');
    }
}
