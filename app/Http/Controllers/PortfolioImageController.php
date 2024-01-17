<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PortfolioImage;
use App\Models\Service;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

class PortfolioImageController extends Controller
{
    public function createPortfolio(Request $request)
    {
        try {
            $this->validate($request, [
                'image' => 'required | image',
                'title' => 'required | max:25'
            ]);
        } catch (ValidationException $e) {
            $errors = $e->errors();
            if (!($errors instanceof MessageBag)) {
                $errors = new MessageBag($errors);
            }
            $errors->add('validation_scenario', 'portfolio');
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $emp = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $emp = Employee::where('account_id', '=', $acc_id)->first();
        }

        $count = PortfolioImage::where('service_id', '=', $emp->service_id)->count();
        if ($count > 10 || $count < 1) {
            return redirect()->back()->with('errorActivatePortfolio', 'There are already 10 Portfolio Images, please delete some before adding new ones.');
        }

        $file = $request->file('image');
        $img_name = $emp->service_id . '_portfolio_' . time() . '.' . $file->getClientOriginalExtension();
        Storage::putFileAs('public/asset/images/services/portofolio', $file, $img_name);

        PortfolioImage::create([
            'service_id' => $emp->service_id,
            'image_path' => $img_name,
            'portfolio_title' => $request->title
        ]);

        return redirect()->back();
    }

    public function deletePortfolio(Request $request)
    {
        $port = PortfolioImage::find($request->id);
        $service_id = $port->service_id;
        $port->delete();

        $count = PortfolioImage::where('service_id', '=', $service_id)->count();
        if ($count < 1) {
            $service = Service::find($service_id);
            $service->has_portfolio = false;
            $service->save();
        }


        return redirect()->back();
    }

    public function activatePortfolio()
    {
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $emp = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $emp = Employee::where('account_id', '=', $acc_id)->first();
        }

        $count = PortfolioImage::where('service_id', '=', $emp->service_id)->count();
        if ($count < 1) {
            return redirect()->back()->with('error', 'There are no portfolio images available. Please add some.');
        }

        $service = Service::find($emp->service_id);

        $service->has_portfolio = true;
        $service->save();

        return redirect()->back();
    }

    public function deactivatePortfolio()
    {
        $acc_role = Auth::user()->account_role;
        $acc_id = Auth::user()->account_id;
        if ($acc_role == 'Super Admin') {
            $emp = SuperAdmin::where('account_id', '=', $acc_id)->first();
        } else {
            $emp = Employee::where('account_id', '=', $acc_id)->first();
        }

        $service = Service::find($emp->service_id);

        $service->has_portfolio = false;

        $service->save();

        return redirect()->back();
    }
}
