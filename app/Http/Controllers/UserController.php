<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function category()
    {
        return view('category');
    }

    public function list()
    {
        return view('list');
    }
}
