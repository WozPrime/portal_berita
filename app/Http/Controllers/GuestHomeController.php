<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class GuestHomeController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $posts = Post::paginate(10);
        $newPost = Post::take(3)->get();
        return view('home.home',compact('tags','posts','newPost'));
    }
}
