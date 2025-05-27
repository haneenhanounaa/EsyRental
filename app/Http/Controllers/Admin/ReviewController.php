<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function index()
    {
        $reviews = Review::with(['apartment', 'user'])->latest()->get();

        return view('dashboard.reviews.index', compact('reviews'));
    }

    public function exportPdf()
    {
        $reviews = Review::with(['apartment', 'user'])->latest()->get();

        $pdf = Pdf::loadView('dashboard.reviews.pdf', compact('reviews'));
        return $pdf->download('reviews-list.pdf');
    }
}
