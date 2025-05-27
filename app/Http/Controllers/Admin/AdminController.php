<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SettingsHelper;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Booking;
use App\Models\Review;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    function index() :View
    {
        $apartmentCount = Apartment::count();
        $reviewCount = Review::count();
        $bookingCount = Booking::count();
        $clientCount = User::where('role', 'client')->count();
        $userCount = User::where('role', 'user')->count();
        $confirmedCount = Booking::where('status', 'Confirmed')->count();
        $pendingCount = Booking::where('status', 'Pending')->count();
        return view('dashboard.index',compact('apartmentCount','reviewCount','bookingCount','clientCount','userCount','confirmedCount','pendingCount'));
    }

    function settings() :View
    {
        return view('dashboard.settings');
    }

    // function dashboard() :View
    // {
    //     return view('dashboard.dashboard');
    // }
    

    function settings_save(Request $request) :RedirectResponse
    {
        $data = $request->except('_token','_method','site_logo');

        if($request->hasFile('site_logo')){
            $data['site_logo'] = $request->file('site_logo')->store('custom');
        }
        foreach($data as $key => $value){
            Setting::updateOrCreate([
                'key'=> $key
            ],[
                'value'=> $value
            ]);
        }
        return redirect()->back()->with('success','Settings Saved');
    
    }

//     public function home(): View
// {
//     $settings = SettingsHelper::all();

//     return view('website.index', compact('settings'));
// }

}
