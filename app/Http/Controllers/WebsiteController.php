<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    function index(): View
    {
        $apartments = Apartment::all();

        return view('website.index', compact('apartments'));
    }
    
}
