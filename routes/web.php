<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('/about', 'about')->name('about');

Route::name('auth.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::view('/login', 'login')
            ->name('login');

        Route::post('/login', [SessionController::class, 'store'])
            ->name('login.post');

        Route::view('/signup', 'signup')
            ->name('signup');

        Route::post('/signup', RegisterUserController::class)
            ->name('signup.post');
    });

    Route::post('/logout', [SessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout.post');
});

Route::resource('news', NewsController::class);
