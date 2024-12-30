<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function() {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/test', [BaseController::class, 'test'])->name('test');

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

Route::get('forgot', function() {
    return Inertia::render('Auth/Forgot');
})->name('forgot');
