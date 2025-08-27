<?php

use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('/signup', 'signup')->name('signup');

Route::controller(AuthenticatedSessionController::class)->group(function () {
    Route::view('/login', 'login')->name('auth.create');
    Route::post('/login', 'store')->name('auth.store');
    Route::post('/logout', 'destroy')->name('auth.destroy');
});
