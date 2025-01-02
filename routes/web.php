<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('guest')->group(function () {
    Route::get('login', function() {
        return Inertia::render('Auth/Login', [
            'status' => session('status'),
            'canResetPassword' => Route::has('password.reset')
        ]);
    })->name('login');

    Route::post('login', [AuthController::class, 'store'])
        ->name('login');

    Route::get('register', function() {
        return Inertia::render('Auth/Register');
    })->name('register');

    Route::post('register', [AuthController::class, 'register']);

    Route::get('forgot', function() {
        return Inertia::render('Auth/Forgot');
    })->name('forgot');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'destroy'])
        ->name('logout');

    Route::get('profile', function() {
        return Inertia::render('Auth/Profile');
    })->name('profile');

    Route::patch('/profile', [AuthController::class, 'update'])->name('profile.update');

});

Route::get('/', function() {
    return Inertia::render('Welcome');
})->name('home');






