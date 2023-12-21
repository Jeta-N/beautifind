<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Promotion;
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

        $file = $request->file('image');
        $img_name = $emp->service_id.'_promo_'.time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $img_name);
        $path = $img_name;

        Promotion::create([
            'service_id' => $emp->service_id,
            'image_path' => $path,
            'promo_title' => $request->title,
            'promo_description' => $request->desc,
        ]);
    }
}
