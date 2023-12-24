<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PortfolioImage;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortfolioImageController extends Controller
{
    public function viewPortfolios(){
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin'){
            $user = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $user = Employee::where('account_id','=',$acc_id)->first();
        }

        $ports = PortfolioImage::where('service_id', '=', $user->service_id)->get();

        return view('viewPorts')->with('ports', $ports);
    }

    public function createPortfolio(Request $request){
        $this->validate($request, [
            'image' => 'required | image',
            'title' => 'required | max:25'
        ]);

        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin'){
            $emp = SuperAdmin::where('account_id','=',$acc_id)->first();
        }else{
            $emp = Employee::where('account_id','=',$acc_id)->first();
        }

        $file = $request->file('image');
        $img_name = $emp->service_id.'_portfolio_'.time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $img_name);
        $path = $img_name;

        PortfolioImage::create([
            'service_id' => $emp->service_id,
            'image_path' => $path,
            'portfolio_title' => $request->title
        ]);
    }

    public function deletePortfolio(Request $request){
        $port = PortfolioImage::find($request->pi_id);
        $port->delete();

        return redirect()->back();
    }
}
