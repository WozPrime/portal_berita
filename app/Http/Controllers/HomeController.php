<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $data['barActive'] = 'home';
        // dd(
        //     now()->month
        // );

        $month = array();
        $user = User::selectRaw('count(*) as user')->get();
        $tag = Tag::selectRaw('count(*) as tag')->get();
        $post = Post::selectRaw('count(*) as post')->get();
        for ($i = 1; $i < 13; $i++) {
            if ($i < 10) {
                $jumlah = Post::selectRaw('count(*) as jumlah')->where('created_at', 'like', '%' . now()->year . '-0' . $i . '%')->get();
            } else {
                $jumlah = Post::selectRaw('count(*) as jumlah')->where('created_at', 'like', '%' . now()->year . '-' . $i . '%')->get();
            }
            array_push($month, $jumlah);
        }

        return view('admin.dashboard', compact('month','user','tag','post'));
    }
}
