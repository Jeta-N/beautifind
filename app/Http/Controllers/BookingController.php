<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingSlot;
use App\Models\Employee;
use App\Models\EmployeeServiceType;
use App\Models\Review;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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

    public function staffBooking(Request $request)
    {
        $acc_id = Auth::user()->account_id;
        $acc_role = Auth::user()->account_role;

        if ($acc_role == 'Super Admin') {
            $user = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $user = Employee::where('account_id', '=', $acc_id)->first();
        }

        if ($acc_role == 'Staff') {
            $bookings = Booking::where('service_id', '=', $user->service_id)
                ->with(['bookingSlot', 'bookingSlot.employee', 'user', 'serviceType', 'service.serviceServiceType'])
                ->whereHas('bookingSlot', function ($query) use ($user) {
                    $query->where('emp_id', $user->emp_id);
                });
        } else {
            $bookings = Booking::where('service_id', '=', $user->service_id)
                ->with(['bookingSlot', 'bookingSlot.employee', 'user', 'serviceType', 'service.serviceServiceType']);
        }

        if ($request->startDate) {
            $bookings->whereHas('bookingSlot', function ($query) use ($request) {
                $query->where('date', '>=', $request->startDate);
            });
        }

        if ($request->endDate) {
            $bookings->whereHas('bookingSlot', function ($query) use ($request) {
                $query->where('date', '<=', $request->endDate);
            });
        }

        if ($request->name) {
            $employees = Employee::where('emp_name', 'like', '%' . $request->name . '%')->get();
            $bookings->whereHas('bookingSlot', function ($query) use ($employees) {
                $empIds = $employees->pluck('emp_id');
                $query->whereIn('emp_id', $empIds);
            });
        }

        if ($request->status) {
            $statuses = explode(',', $request->status);
            $bookings->whereIn('booking_status', $statuses);
        }

        $bookings = $bookings->get();
        return view('pages.staff.booking')->with('bookings', $bookings);
    }

    public function createBooking(Request $request)
    {
        $user = User::where('account_id', '=', Auth::user()->account_id)->first();
        $slot = BookingSlot::find($request->bs_id);
        $req_time_start = $slot->time_start;
        $req_time_end = $slot->time_end;

        $bookings = Booking::query();
        $bookings->where('user_id', '=', $user->user_id);
        $count = $bookings->join('booking_slot', 'booking_slot.bs_id', '=', 'booking.bs_id');
        $count->where('date', '=', $slot->date)->where(function (Builder $query) use ($req_time_start, $req_time_end) {
            $query->where(function (Builder $q)  use ($req_time_start, $req_time_end) {
                $q->where('time_start', '>=', $req_time_start)->where('time_start', '<', $req_time_end);
            })->orWhere(function (Builder $q) use ($req_time_start, $req_time_end) {
                $q->where('time_end', '>', $req_time_start)->where('time_end', '>=', $req_time_end);
            });
        });

        $countResult = $count->count();

        if ($countResult > 0) {
            return redirect()->back()->with('errorBook', 'Another booking is at the same time');
        }

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
        $booking->booking_status = $request->status;
        $booking->save();

        if ($request->status == 'Cancelled') {
            $slot = BookingSlot::find($booking->bs_id);
            $slot->is_available = true;
            $slot->save();
        }

        return redirect()->back();
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
