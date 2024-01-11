<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Faq;
use App\Models\Service;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function createFAQ(Request $request)
    {
        $this->validate($request, [
            'question' => 'required | min:5 | max:100',
            'answer' => 'required | min:5 | max:255'
        ]);

        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $emp = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $emp = Employee::where('account_id', '=', $acc_id)->first();
        }

        $count = Faq::where('service_id', '=', $emp->service_id)->count();
        if ($count > 10) {
            return redirect()->back()->with('error', 'There are already 10 FAQs, please delete some before adding new ones.');
        }

        Faq::create([
            'service_id' => $emp->service_id,
            'faq_question' => $request->question,
            'faq_answer' => $request->answer
        ]);

        return redirect()->back();
    }

    public function deleteFAQ(Request $request)
    {
        $faq = Faq::find($request->id);
        $service_id = $faq->service_id;
        $faq->delete();

        $count = Faq::where('service_id', '=', $service_id)->count();
        if ($count < 1) {
            $service = Service::find($service_id);
            $service->has_faq = false;
            $service->save();
        }

        return redirect()->back();
    }

    public function activateFAQ()
    {
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $emp = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $emp = Employee::where('account_id', '=', $acc_id)->first();
        }

        $count = Faq::where('service_id', '=', $emp->service_id)->count();
        if ($count < 1) {
            return redirect()->back()->with('error', 'There are no FAQs available. Please add some.');
        }

        $service = Service::find($emp->service_id);

        $service->has_faq = true;
        $service->save();

        return redirect()->back();
    }

    public function deactivateFAQ()
    {
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $emp = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $emp = Employee::where('account_id', '=', $acc_id)->first();
        }
        $service = Service::find($emp->service_id);

        $service->has_faq = false;
        $service->save();

        return redirect()->back();
    }
}
