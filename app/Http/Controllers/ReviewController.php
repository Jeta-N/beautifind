<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Employee;
use App\Models\Review;
use App\Models\Service;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function staffReviews()
    {
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $user = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $user = Employee::where('account_id', '=', $acc_id)->first();
        }

        $reviews = Review::where('service_id', '=', $user->service_id)
            ->with('user')
            ->with('booking')
            ->with('booking.serviceType')
            ->with('booking.bookingSlot')
            ->with('booking.bookingSlot.employee')
            ->get();
        $rating = Review::where('service_id', '=', $user->service_id)->avg('rating');

        return view('pages.staff.review', [
            'reviews' => $reviews,
            'rating' => $rating
        ]);
    }

    public function createReview(Request $request)
    {
        $this->validate($request, [
            'rating' => 'required',
            'review' => 'min:5 | max:255'
        ]);

        $booking = Booking::find($request->id);
        $acc_id = Auth::user()->account_id;
        $user = User::where('account_id', '=', $acc_id)->first();

        Review::create([
            'user_id' => $user->user_id,
            'booking_id' => $request->id,
            'service_id' => $booking->service_id,
            'rating' => $request->rating,
            'review_content' => $request->review
        ]);

        return redirect('/profile?activeTab=myOrder')->with('successReview', 'Review has been submitted');
    }

    public function viewReviewForm(Request $request)
    {
        $bookings = Booking::where('booking_id', '=', $request->id)->first();
        // Conditionally apply status filter
        $bookings->with('bookingSlot');
        $bookings->with('bookingSlot.employee');
        $bookings->with('service');
        $bookings->with('service.city');
        $bookings->with('serviceType');


        return view('pages.review-form', [
            'booking' => $bookings
        ]);
    }

    public function deleteReview(Request $request)
    {
        $review = Review::find($request->id);
        $review->delete();

        return redirect()->back()->with('successDeleteReview', 'successfully deleted');
    }

    public function adminReviews(Request $request)
    {
        $acc_role = Auth::user()->account_role;
        if ($acc_role != 'Website Manager') {
            Auth::logout();
            return view('pages.staff.login');
        }

        $reviews = Review::with('user')
            ->with('booking')
            ->with('service');

        if ($request->name) {
            $reviews->whereHas('user', function ($query) use ($request) {
                $query->where('user_name', 'like', '%' . $request->name . '%');
            });
        }

        if ($request->service) {
            $reviews->whereHas('service', function ($query) use ($request) {
                $query->where('service_id', '=', $request->service);
            });
        }

        $reviews = $reviews->get();

        $servicesName = Service::pluck('service_name');

        return view('pages.admin.reviews', [
            'reviews' => $reviews,
            'servicesName' => $servicesName
        ]);
    }
}
