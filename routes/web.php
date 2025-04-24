<?php

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [WebsiteController::class, 'index'])->name('website.index');

// Route::get('/about',[WebsiteController::class,'about'])->name('website.about');
// Route::get('/about',[WebsiteController::class,'contect'])->name('website.contect');
// Route::get('/about',[WebsiteController::class,'post'])->name('website.post');


Route::get('/bookings/create/{apartment}', [BookingController::class, 'create'])
    ->middleware(['auth'])
    ->name('bookings.create');
Route::post('/bookings/store', [BookingController::class, 'store'])->middleware(['auth'])->name('bookings.store');

Route::post('/dashboard/bookings/{booking}/confirm', [BookingController::class, 'confirm'])
    ->middleware(['auth']) // customize your middleware
    ->name('bookings.confirm');


Route::get('/owner/bookings/{booking}', [BookingController::class, 'showOwnerBooking'])
    ->name('owner.bookings.show')
    ->middleware('auth');

// Route::post('/notifications/{notification}/mark-as-read', function ($notificationId) {
//     $notification = auth()->user()->notifications()->findOrFail($notificationId);
//     $notification->markAsRead();
//     return response()->json(['success' => true]);
// })->middleware('auth')->name('notifications.markAsRead');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
