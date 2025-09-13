<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\NewsPostController;
use App\Http\Controllers\SignupController;
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

        Route::post('/signup', SignupController::class)
            ->name('signup.post');
    });

    Route::post('/logout', [SessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout.post');
});

Route::resource('news', NewsPostController::class)->parameter('news', 'post');
