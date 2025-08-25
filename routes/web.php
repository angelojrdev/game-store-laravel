<?php

use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('/signup', 'signup')->name('signup');

Route::controller(AuthenticatedSessionController::class)->group(function () {
    Route::view('/login', 'login')->name('login');

    Route::post('/login', 'store')->name('login.store');
    Route::post('/logout', 'destroy')->name('logout');
});
