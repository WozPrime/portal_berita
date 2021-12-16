<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;

class ViewController extends Controller
{
    public function index()
    {
        $data['post'] = Post::select('id', 'judul')
            //     ->selectRaw('(CASE WHEN progress <= 25 THEN "danger" 
            //     WHEN progress <= 50 THEN "warning" 
            //     WHEN progress <= 75 THEN "primary" 
            //     ELSE "success" END) AS status_label')
            ->get();
        return view('admin/view', $data);
    }
    public function editKonten(Request $req)
    {
        // dd($req->id);
        if ($req->id != 'submit') {
            $data['post'] = Post::select('*')
                ->where('id', $req->id)
                ->get();
            return view('admin/edit', $data);
        } elseif ($req->id == 'submit') {
            $storage = "summer/img";
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML($req->post, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            libxml_clear_errors();
            $images = $dom->getElementsByTagName("img");
            foreach ($images as $img) {
                $src = $img->getAttribute('src');
                if (preg_match('/data:image/', $src)) {
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];
                    $fileNameContent = uniqid();
                    $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                    $filepath = ("$storage/$fileNameContentRand.$mimetype");
                    $image = Image::make($src)
                        // ->resize(1200, 1200)
                        ->encode($mimetype, 100)
                        ->save(public_path($filepath));
                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                    $img->setAttribute('class', 'img-responsive');
                }
            }
            $data = [
                'judul' => $req->judul,
                'konten' => $dom->saveHTML(),

            ];
            Post::where('id', $req->idPost)->update($data);
            return redirect()->to('/');
        }
    }
}
