<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/comment', UserController::class);

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/', function () {
        return "Dashboard";
    });

    Route::get('/profile', function () {
    });
});

Route::middleware('auth')->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
