<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\AuthController;
use App\Models\User;

Route::get('/', function () {
    
    return view('welcome');
});
Route::resource('flights', FlightController::class);
Route::get('flights/{id}/delete', [FlightController::class, 'confirmDelete'])->name('flights.confirmDelete');
Route::resource('airports', AirportController::class);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('signup', [AuthController::class, 'signup']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('flights', FlightController::class);
    Route::resource('airports', AirportController::class);
});


