<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::resource('/comment', UserController::class);
Route::middleware('auth')->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/', function () {
        return "Dashboard";
    });
    Route::get('/profile', function () {
    });
});
Route::middleware(['role', 'auth'])->group(function () {
    // Post Part
    Route::get('/post', [App\Http\Controllers\PostController::class, 'post'])->name('post');
    Route::get('/post/tables',[App\Http\Controllers\PostController::class,'show'])->name('post_tables');
    Route::post('/admin/post', [App\Http\Controllers\PostController::class, 'postKonten'])->name('postKonten');
    Route::post('/post/update', [App\Http\Controllers\PostController::class, 'update'])->name('update');
    Route::get('/view/{id}', [App\Http\Controllers\PostController::class, 'view'])->name('view');
    Route::get('/post/tables/delete/{id}',[App\Http\Controllers\PostController::class, 'destroy'])->name('delete_post');

    Route::resource('/tags',TagController::class);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
