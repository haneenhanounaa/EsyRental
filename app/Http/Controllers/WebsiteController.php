<?php

namespace App\Http\Controllers;

use App\Helpers\SettingsHelper;
use App\Models\Apartment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class WebsiteController extends Controller
{
    function index(): View
    {
        $apartments = Apartment::all();
        $settings = SettingsHelper::all();


        return view('website.index', compact('apartments', 'settings'));
    }

    function map(): View
    {
        $apartments = Apartment::all();


        return view('website.map', compact('apartments'));
    }

    function filter(Request $request): View
    {
        $location = $request->get('location');
        $apartments = collect(); // Initially, an empty collection
        $settings = SettingsHelper::all();


        // Only perform the search if the location is provided
        if ($location) {
            $apartments = Apartment::where('location', 'LIKE', "%{$location}%")->get();
        }
        return view('website.filter', compact('apartments','settings'));

    }
}
