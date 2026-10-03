<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

Route::withoutMiddleware([
    PreventRequestForgery::class,
    StartSession::class,
    ShareErrorsFromSession::class,
])->group(function () {
    Route::get('/test-frontend', function () {
        return '<h1>Frontend berhasil!</h1>';
    });

    Route::get('/register', function () {
        return view('auth.register');
    });

    Route::get('/login', function () {
        return view('auth.login');
    });

    Route::get('/verification', function () {
        return view('auth.verification');
    });

    Route::view('/test', 'auth.verification');

    Route::get('/', function () {
        return view('welcome');
    });
});
