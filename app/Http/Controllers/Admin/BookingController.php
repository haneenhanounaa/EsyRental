<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Apartment;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $bookings = Booking::with(['apartment', 'user'])->latest()->get();
        // return view('dashboard.bookings.index', compact('bookings'));

        $bookings = Booking::with(['apartment', 'user'])
            ->latest()
            ->get()
            ->map(function ($booking) {
                $booking->start_date = \Carbon\Carbon::parse($booking->start_date);
                $booking->end_date = \Carbon\Carbon::parse($booking->end_date);
                return $booking;
            });

        return view('dashboard.bookings.index', compact('bookings'));
    }

    public function exportPdf()
    {
        $bookings = Booking::with(['apartment', 'user'])
            ->latest()
            ->get()
            ->map(function ($booking) {
                $booking->start_date = \Carbon\Carbon::parse($booking->start_date);
                $booking->end_date = \Carbon\Carbon::parse($booking->end_date);
                return $booking;
            });
        $pdf = Pdf::loadView('dashboard.bookings.pdf', compact('bookings'));
        return $pdf->download('bookings-list.pdf');
    }
}
