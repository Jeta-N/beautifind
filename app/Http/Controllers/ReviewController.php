<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Review;
use App\Models\SuperAdmin;
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
}
