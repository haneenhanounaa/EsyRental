<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Booking;
use App\Notifications\BookingConfirmedNotification;
use App\Notifications\NewBookingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //
    public function create(Apartment $apartment)
    {
        // return view('website.bookings.create', compact('apartment','apartments'));
        $apartments = Apartment::all(); // or whatever query you use to get all apartments
        return view('website.bookings.create', compact('apartment', 'apartments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $apartment = Apartment::findOrFail($data['apartment_id']);
        $numberOfDays = now()->parse($data['start_date'])->diffInDays(now()->parse($data['end_date']));
        $pricePerNight = $apartment->price;
        $finalPrice = $pricePerNight * $numberOfDays;

        $booking = Booking::create([
            'apartment_id' => $data['apartment_id'],
            'user_id' => Auth::id(),
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'number_of_days' => $numberOfDays,
            'price' => $pricePerNight,
            'final_price' => $finalPrice,
            'status' => 'pending',
        ]);

        // Notify the apartment owner
        $apartmentOwner = $apartment->owner; // make sure you define this relation
        $apartmentOwner->notify(new NewBookingNotification($booking));

        return redirect()->route('website.index')->with('success', 'Your booking has been submitted!');
    }

    public function confirm(Booking $booking)
    {
        // You can also use Gate::authorize if needed
        $booking->update(['status' => 'confirmed']);

        // Notify the client
        $booking->user->notify(new BookingConfirmedNotification($booking));

        return back()->with('success', 'Booking has been confirmed and client notified.');
    }

    public function showOwnerBooking(Booking $booking)
    {
        // Optional: Mark the notification as read
        if (request()->has('notification_id')) {
            auth()->user()->unreadNotifications
                ->where('id', request('notification_id'))
                ->markAsRead();
        }
        return view('dashboard.bookings.owner-show', compact('booking'));
    }

}
