<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;



// Register the middleware first
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
  Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
  Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
  Route::put('/settings', [AdminController::class, 'settings_save']);
//  Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


});



Route::prefix('admin')->middleware(['auth'])->group(function () {

  Route::resource('users', UserController::class);

  Route::resource('apartments', ApartmentController::class);
  Route::resource('bookings', AdminBookingController::class);
  Route::get('bookings/export/pdf', [AdminBookingController::class, 'exportPdf'])->name('bookings.export.pdf');

  Route::resource('reviews', ReviewController::class)->only(['index']);
  Route::get('reviews/export/pdf', [ReviewController::class, 'exportPdf'])->name('reviews.export.pdf');
});