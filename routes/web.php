<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsPostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('/signup', 'signup')->name('signup');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'create')->name('auth.create');
    Route::post('/login', 'store')->name('auth.store');
    Route::post('/logout', 'destroy')->name('auth.destroy');
});

Route::resource('news', NewsPostController::class);
