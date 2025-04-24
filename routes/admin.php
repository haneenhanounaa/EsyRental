<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;



// Register the middleware first
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
  Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
Route::prefix('admin')->middleware(['auth'])->group(function () {

  Route::resource('apartments', ApartmentController::class);
});