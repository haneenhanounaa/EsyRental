<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ClientBookingController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('/about',[WebsiteController::class,'about'])->name('website.about');
// Route::get('/about',[WebsiteController::class,'contect'])->name('website.contect');
// Route::get('/about',[WebsiteController::class,'post'])->name('website.post');


// Route::get('/', [AdminController::class, 'home'])->name('home');


Route::prefix('client')->name('client.')->group(function () {

   Route::get('/bookings/create/{apartment}', [ClientBookingController::class, 'create'])
    ->middleware(['auth'])
    ->name('bookings.create');

    Route::post('/bookings/store', [ClientBookingController::class, 'store'])->name('bookings.store');

 
});
Route::post('/dashboard/bookings/{booking}/confirm', [ClientBookingController::class, 'confirm'])
->middleware(['auth']) // customize your middleware
->name('bookings.confirm');




Route::get('/owner/bookings/{booking}', [ClientBookingController::class, 'showOwnerBooking'])
    ->name('owner.bookings.show')
    ->middleware('auth');


 Route::get('/show/bokkings/{booking}', [ClientBookingController::class, 'show'])
    ->name('bookings.show')
    ->middleware('auth');

Route::post('/reviews', [ReviewController::class, 'store'])->middleware('auth')->name('reviews.store');


Route::get('/', [WebsiteController::class, 'index'])->name('website.index');

Route::get('/map', [WebsiteController::class, 'map'])->name('website.map');

Route::get('/filter', [WebsiteController::class, 'filter'])->name('website.filter');




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
