<?php

use App\Http\Controllers\GuestHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Auth;


Route::get('/', [GuestHomeController::class,'index'])->name('home_page');

Auth::routes();
Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::resource('/comment', UserController::class);
Route::middleware('auth')->get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/', function () {
        return "Dashboard";
    });
    Route::get('/profile', function () {
    });
});
Route::middleware(['role', 'auth'])->group(function () {
    // Post Part
    Route::get('/post', [PostController::class, 'post'])->name('post');
    Route::get('/post/tables',[PostController::class,'show'])->name('post_tables');
    Route::post('/admin/post', [PostController::class, 'postKonten'])->name('postKonten');
    Route::post('/post/update', [PostController::class, 'update'])->name('update');
    Route::get('/view/{id}', [PostController::class, 'view'])->name('view');
    Route::get('/post/{id}/edit', [PostController::class,'edit'])->name('edit_post');
    Route::post('/post/edit', [PostController::class,'update_post'])->name('update_post');
    Route::get('/post/tables/delete/{id}',[PostController::class, 'destroy'])->name('delete_post');

    Route::resource('/tags',TagController::class);
});

