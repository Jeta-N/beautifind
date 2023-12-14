<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Faq;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function viewFaqs(){
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin'){
            $user = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $user = Employee::where('account_id','=',$acc_id)->first();
        }

        $faqs = Faq::where('service_id', '=', $user->service_id)->get();

        return view('viewFaq')->with('faqs', $faqs);
    }
}
