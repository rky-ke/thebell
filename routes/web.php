<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BellController;
use App\Http\Controllers\DashboardController;


Route::redirect('/', '/bells');

Route::resource('bells', BellController::class);

Route::get('/{user}/bells', [DashboardController::class, 'userBells'])->name('bells.user');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', function () {
        return view('users.profile');
    })->name('profile');

    Route::get('/settings', function () {
        return view('users.settings');
    })->name('settings');

    Route::get('/notifications', function () {
        return view('users.notifications');
    })->name('notifications');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')->name('register.view');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

