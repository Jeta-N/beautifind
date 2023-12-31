<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Promotion;
use App\Models\Service;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    public function viewPromotions(){
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin'){
            $user = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $user = Employee::where('account_id','=',$acc_id)->first();
        }

        $promos = Promotion::where('service_id', '=', $user->service_id)->get();

        return view('viewPromo')->with('promos', $promos);
    }

    public function createPromotion(Request $request){
        $this->validate($request, [
            'image' => 'required | image',
            'title' => 'required | max:25',
            'desc' => 'required | max:255'
        ]);

        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin'){
            $emp = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $emp = Employee::where('account_id','=',$acc_id)->first();
        }

        $count = Promotion::where('service_id','=',$emp->service_id)->count();
        if ($count > 10){
            return redirect()->back()->with('error', 'There are already 10 Promotions, please delete some before adding new ones.');
        }

        $file = $request->file('image');
        $img_name = $emp->service_id.'_promo_'.time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $img_name);

        Promotion::create([
            'service_id' => $emp->service_id,
            'image_path' => $img_name,
            'promo_title' => $request->title,
            'promo_description' => $request->desc,
        ]);
    }

    public function deletePromotion(Request $request){
        $promo = Promotion::find($request->promotion_id);
        $promo->delete();

        return redirect()->back();
    }

    public function activatePromotion(){
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin'){
            $emp = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $emp = Employee::where('account_id','=',$acc_id)->first();
        }

        $count = Promotion::where('service_id','=',$emp->service_id)->count();
        if ($count < 1){
            return redirect()->back()->with('error', 'There are no promotions available. Please add some.');
        }

        $service = Service::find($emp->service_id);

        $service->has_promo = true;
        $service->save();

        return redirect()->back();
    }

    public function deactivatePromotion(){
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin'){
            $emp = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $emp = Employee::where('account_id','=',$acc_id)->first();
        }
        $service = Service::find($emp->service_id);

        $service->has_promo = false;
        $service->save();

        return redirect()->back();
    }
}
