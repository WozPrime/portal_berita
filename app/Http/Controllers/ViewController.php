<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ViewController extends Controller
{
    public function index()
    {
        $data['post'] = Post::select('*')
            //     ->selectRaw('(CASE WHEN progress <= 25 THEN "danger" 
            //     WHEN progress <= 50 THEN "warning" 
            //     WHEN progress <= 75 THEN "primary" 
            //     ELSE "success" END) AS status_label')
            ->get();
        return view('admin/view', $data);
    }
}
