<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $apartments = Apartment::all();
        
            return view('dashboard.apartments.index', compact('apartments'));

    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.apartments.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'rooms' => 'required|integer|min:1',
            'num_guests' => 'required|integer|min:1',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('apartments', 'public');
        }

        $data['user_id'] = auth()->id();
        Apartment::create($data);

        return redirect()->route('apartments.index')->with('success', 'Apartment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {
        //   
             return view('dashboard.apartments.edit', compact('apartment'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'rooms' => 'required|integer|min:1',
            'num_guests' => 'required|integer|min:1',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            if ($apartment->image) {
                Storage::disk('public')->delete($apartment->image);
            }
            $data['image'] = $request->file('image')->store('apartments', 'public');
        }

        $apartment->update($data);

        return redirect()->route('apartments.index')->with('success', 'Apartment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        //
        if ($apartment->image) {
            Storage::disk('public')->delete($apartment->image);
        }
        $apartment->delete();

        return redirect()->route('apartments.index')->with('success', 'Apartment deleted successfully.');
    }
    }

