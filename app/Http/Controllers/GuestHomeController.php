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
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $prev = Post::find($id-1);
        $next = Post::find($id+1);
        if($prev == ''){
            $prevPage = '';
            $prevTitle = 'No News Before';
        }else{
            $prevPage = $prev->id;
            $prevTitle = $prev->judul;
        }
        if($next == ''){
            $nextPage = '';
            $nextTitle = 'No News After';
        }else{
            $nextPage = $next->id;
            $nextTitle = $next->judul;
        }
        $tags = Tag::all();
        return view('home.news',compact('post','tags','prevPage','nextPage','prevTitle','nextTitle'));
    }
}
