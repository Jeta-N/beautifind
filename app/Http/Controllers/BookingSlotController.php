<?php

namespace App\Http\Controllers;

use App\Models\BookingSlot;
use App\Models\Employee;
use App\Models\ServiceServiceType;
use App\Models\SuperAdmin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingSlotController extends Controller
{
    public function staffBookingSlot(Request $request)
    {
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;

        if ($acc_role == 'Super Admin') {
            $user = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $user = Employee::where('account_id', '=', $acc_id)->first();
        }

        if ($acc_role == 'Staff') {
            $bookingSlots = BookingSlot::where('service_id', '=', $user->service_id)
                ->where('emp_id', '=', $user->emp_id);
        } else {
            $bookingSlots = BookingSlot::where('service_id', '=', $user->service_id);
        }

        if ($request->startDate) {
            $bookingSlots->where('date', '>', $request->startDate);
        }

        if ($request->endDate) {
            $bookingSlots->where('date', '<=', $request->endDate);
        }

        if ($request->name) {
            $employees = Employee::where('emp_name', 'like', '%' . $request->name . '%')->get();
            $bookingSlots->whereIn('emp_id', $employees->pluck('emp_id'));
        }

        if ($request->status) {
            $status = $request->status == 'Available' ? true : false;
            $bookingSlots->where('is_available', $status);
        }

        $bookingSlots = $bookingSlots->get();

        $employees = Employee::where('service_id', '=', $user->service_id)->get();

        return view('pages.staff.booking-slots', [
            'bookingSlots' => $bookingSlots,
            'employees' => $employees
        ]);
    }

    public function createBookingSlot(Request $request)
    {
        $this->validate($request, [
            'emp_id' => 'required',
            'date' => 'required',
            'time_start' => 'required',
            'time_end' => 'required|after:time_start',
            'repeat' => 'required | min:1 | max:10',
        ]);

        $emp = Employee::find($request->emp_id);
        $emp_id = $emp->emp_id;
        $service_id = $emp->service_id;
        $date = $request->date;
        $req_time_start = $request->time_start;
        $req_time_end = $request->time_end;
        $i = 0;

        do {
            $count = BookingSlot::where('date', '=', $date)->where('emp_id', '=', $emp_id)->where(function (Builder $query) use ($req_time_start, $req_time_end) {
                $query->where(function (Builder $q)  use ($req_time_start, $req_time_end) {
                    $q->where('time_start', '<=', $req_time_start)->where('time_start', '>', $req_time_end);
                })->orWhere(function (Builder $q) use ($req_time_start, $req_time_end) {
                    $q->where('time_end', '<', $req_time_start)->where('time_end', '>=', $req_time_end);
                });
            })->count();
            if ($count == 0) {
                BookingSlot::create([
                    'emp_id' => $emp_id,
                    'service_id' => $service_id,
                    'date' => $date,
                    'time_start' => $req_time_start,
                    'time_end' => $req_time_end,
                    'is_available' => true
                ]);
            }
            $date = date("Y-m-d", strtotime('+7 days', strtotime($date)));
            $i++;
        } while ($i < $request->repeat);


        return redirect()->back()->with('successCreateBookingSlot', 'Successfully create booking slot');
    }

    public function deleteBookingSlot(Request $request)
    {
        $slot = BookingSlot::find($request->bs_id);
        if ($slot->is_available) {
            $slot->delete();
        } else {
            return redirect()->back()->with('errorDeleteBookingSlot', 'Booking Slot is reserved');
        }

        return redirect()->back();
    }

    public function getBookingSlots(Request $request)
    {
        $date = $request->date;
        $employeeId = $request->employeeId;
        $booking_slots = BookingSlot::where('service_id', '=', $request->serviceId)
            ->where('emp_id', '=', $employeeId)
            ->where('date', '=', $date)
            ->where('is_available', '=', true)
            ->get();
        return response()->json($booking_slots);
    }

    public function showAvailableSlots(Request $request)
    {
        $slots = BookingSlot::query();
        $slots->where('is_available', '=', true)->where('emp_id', '=', $request->emp_id)->select(DB::raw('*, TIMESTAMPDIFF(MINUTE, CAST(CONCAT(date, " ",time_start) AS datetime), CAST(CONCAT(date, " ",time_end) AS datetime)) as duration'));

        $duration = ServiceServiceType::where('st_id', '=', $request->st_id)->where('service_id', '=', $request->service_id)->select('duration');

        $slots->where('duration', '>=', $duration)->get();
    }
}
