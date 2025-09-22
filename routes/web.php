<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return Inertia::render('Login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login.enter');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('login.logout');

    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('home');
});