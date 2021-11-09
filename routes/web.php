<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function ()
{
    return 'Home';
});

Route::get('/login', [UserController::class, 'category']);