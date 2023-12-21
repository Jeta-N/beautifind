<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Employee;
use App\Models\Review;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function viewReviews(){
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin'){
            $user = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $user = Employee::where('account_id','=',$acc_id)->first();
        }

        $reviews = Review::where('service_id', '=', $user->service_id)->get();
        $rating = Review::where('service_id', '=', $user->service_id)->avg('rating');
        // dd($rating);

        return view('viewReview')->with('reviews', $reviews)->with('rating', $rating);
    }

    public function createFAQ(Request $request){
        $this->validate($request, [
            'rating' => 'required',
            'content' => 'min:5 | max:255'
        ]);

        $booking = Booking::find($request->booking_id);
        $acc_id = Auth::user()->account_id;
        $user = User::where('account_id', '=',$acc_id)->first();

        Review::create([
            'user_id' => $user->user_id,
            'booking_id' => $request->booking_id,
            'service_id' => $booking->service_id,
            'rating' => $request->rating,
            'review_content' => $request->content
        ]);
    }
}
