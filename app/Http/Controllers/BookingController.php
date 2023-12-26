<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingSlot;
use App\Models\Employee;
use App\Models\EmployeeServiceType;
use App\Models\Review;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function viewUserBooking(Request $request)
    {
        $acc_id = Auth::user()->account_id;
        $user = User::where('account_id', '=', $acc_id)->first();
        $bookings = Booking::where('user_id', '=', $user->user_id);
        $bookings->with('bookingSlot');
        $bookings->with('bookingSlot.employee');
        $bookings->with('service');
        $bookings->with('service.city');
        $bookings->with('serviceType');

        if ($request->status !== 'All') {
            $bookings->where('booking_status', '=', $request->status);
        } else {
            $bookings->whereIn('booking_status', ['Upcoming', 'Done', 'Cancelled']);
        }
        $bookings = $bookings->orderBy('booking_status', 'desc')->get();

        return response()->json($bookings);
    }

    public function viewServiceBooking($acc_role)
    {
        $acc_id = Auth::user()->account_id;
        $user = null;
        if ($acc_role == 'Super Admin') {
            $user = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $user = Employee::where('account_id', '=', $acc_id)->first();
        }
        $bookings = Booking::where('service_id', '=', $user->service_id)->orderBy('booking_status', 'desc')->get();
        return view('viewBooking')->with('bookings', $bookings);
    }

    public function viewStaffBooking()
    {
        $acc_id = Auth::user()->account_id;
        $user = Employee::where('account_id', '=', $acc_id)->first();
        $bookings = Booking::where('booking.service_id', '=', $user->service_id)
            ->join('booking_slot', 'booking.bs_id', '=', 'booking_slot.bs_id')
            ->where('booking_slot.emp_id', '=', $user->emp_id)
            ->orderBy('booking.booking_status', 'desc')->get();
        return view('viewBooking')->with('bookings', $bookings);
    }

    public function createBooking(Request $request)
    {
        $user = User::where('account_id', '=', Auth::user()->account_id)->first();
        $slot = BookingSlot::find($request->bs_id);
        $service_id = $slot->service_id;
        $est = EmployeeServiceType::where('emp_id', '=', $slot->emp_id)->where('st_id', '=', $request->id)->first();
        $price = $est->price;

        Booking::create([
            'user_id' => $user->user_id,
            'st_id' => $request->id,
            'bs_id' => $request->bs_id,
            'service_id' => $service_id,
            'price' => $price,
            'booking_status' => 'Upcoming'
        ]);

        $slot = BookingSlot::find($request->bs_id);
        $slot->is_available = false;
        $slot->save();

        return redirect()->back()->with('successBook', 'success');
    }

    public function updateBookingStatus(Request $request)
    {
        $booking = Booking::find($request->booking_id);
        $booking->status = $request->status;
        $booking->save();

        if ($request->status == 'Cancelled') {
            $slot = BookingSlot::find($booking->bs_id);
            $slot->is_available = true;
            $slot->save();
        }

        return redirect('/booking');
    }
    public function cancelBooking(Request $request)
    {
        $booking = Booking::find($request->id);
        $booking->booking_status = 'Cancelled';
        $booking->updated_at = now();
        $booking->save();

        $bookingSlot = BookingSlot::where('bs_id', '=', $booking->bs_id)->first();
        $bookingSlot->is_available = true;
        $bookingSlot->save();

        return redirect()->back()->with('successCancel', 'Your book has been cancelled');
    }
}
