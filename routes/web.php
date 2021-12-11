<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::resource('/comment', UserController::class);

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/', function () {
        return "Dashboard";
    });

    Route::get('/profile', function () {
    });
});

Route::middleware('auth')->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->get('/post', [App\Http\Controllers\PostController::class, 'post'])->name('post');
Route::middleware('auth')->post('/admin/post', [App\Http\Controllers\PostController::class, 'postKonten'])->name('postKonten');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
