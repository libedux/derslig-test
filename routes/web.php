<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SeatPlanController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect('events');
});


Route::get('/seat-plans/{eventId}/{eventCategoryId}', [SeatPlanController::class, 'index']);
Route::resource('/events', EventController::class);
Route::resource('/payment', PaymentController::class);

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/settings.php';
