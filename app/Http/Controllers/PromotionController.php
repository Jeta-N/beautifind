<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Promotion;
use App\Models\Service;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

class PromotionController extends Controller
{
    public function createPromotion(Request $request)
    {
        try {
            $this->validate($request, [
                'image' => 'required | image',
                'title' => 'required | max:25',
                'desc' => 'required | max:255'
            ]);
        } catch (ValidationException $e) {
            $errors = $e->errors();
            if (!($errors instanceof MessageBag)) {
                $errors = new MessageBag($errors);
            }
            $errors->add('validation_scenario', 'promotion');
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $emp = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $emp = Employee::where('account_id', '=', $acc_id)->first();
        }

        $count = Promotion::where('service_id', '=', $emp->service_id)->count();
        if ($count > 10) {
            return redirect()->back()->with('errorCreatePromotion', 'There are already 10 Promotions, please delete some before adding new ones.');
        }

        $file = $request->file('image');
        $img_name = $emp->service_id . '_promo_' . time() . '.' . $file->getClientOriginalExtension();
        Storage::putFileAs('public/asset/images/services/promotion', $file, $img_name);

        Promotion::create([
            'service_id' => $emp->service_id,
            'image_path' => $img_name,
            'promo_title' => $request->title,
            'promo_description' => $request->desc,
        ]);

        return redirect()->back()->with('successCreatePromotion', 'successCreatePromotion');
    }

    public function deletePromotion(Request $request)
    {
        $promo = Promotion::find($request->id);
        $service_id = $promo->service_id;
        $promo->delete();

        $count = Promotion::where('service_id', '=', $service_id)->count();
        if ($count < 1) {
            $service = Service::find($service_id);
            $service->has_promo = false;
            $service->save();
        }

        return redirect()->back();
    }

    public function activatePromotion()
    {
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $emp = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $emp = Employee::where('account_id', '=', $acc_id)->first();
        }

        $count = Promotion::where('service_id', '=', $emp->service_id)->count();
        if ($count < 1) {
            return redirect()->back()->with('errorActivatePromotion', 'There are no promotions available. Please add some.');
        }

        $service = Service::find($emp->service_id);

        $service->has_promo = true;
        $service->save();

        return redirect()->back();
    }

    public function deactivatePromotion()
    {
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $emp = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $emp = Employee::where('account_id', '=', $acc_id)->first();
        }
        $service = Service::find($emp->service_id);

        $service->has_promo = false;
        $service->save();

        return redirect()->back();
    }
}
