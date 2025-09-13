<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsPostController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'create')->name('auth.create');
    Route::post('/login', 'store')->name('auth.store');
    Route::post('/logout', 'destroy')->name('auth.destroy');
});

Route::view('/signup', 'signup')->name('signup');
Route::post('/signup', SignupController::class)->name('signup.post');

Route::resource('news', NewsPostController::class)->parameter('news', 'post');
