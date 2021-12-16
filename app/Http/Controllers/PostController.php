<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    protected $postModel;
    public function __construct(Post $post)
    {
        $this->postModel = new Post();
        $this->post = $post;
    }

    public function view($id)
    {
        $data_post = $this->post->find($id);
        return view('admin.view',compact('data_post'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post()
    {
        $tags = Tag::all();
        return view('admin.post', compact('tags'));
    }
    public function postKonten(Request $req)
    {
        // dd($req->tags);
        // Validate
        $req->validate([
            'judul' => 'required',
            'tag[]' => 'required',
            'thumbnail' => 'mimes:jpg,png,jpeg,bmp',
        ], [
            'judul.required' => 'Wajib Diisi!!',
            'tag[].required' => 'Wajib Diisi!!',
        ]);

        //file summernote
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
        
        if ($req->thumbnail <> "") {

            $create = $this->post->create([
                'konten' => $dom->saveHTML(),
                'judul' => $req->judul,
                'uploader' => Auth::user()->name,
            ]);
            $id = $create->id;
            $file = $req->thumbnail;
            $fileName = $id . '.' . $file->extension();
            $file->move(public_path('thumbnail'), $fileName);
            $this->post->where('id',$id)->update([
                'thumbnail' => $fileName,
            ]);
        }else{
            $this->post->create([
                'konten' => $dom->saveHTML(),
                'judul' => $req->judul,
                'uploader' => Auth::user()->name,
            ]);
        }
        return redirect()->to('/post');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data_post = Post::all();
        return view('admin.datatables',compact('data_post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return 'Kebanyakan Edit';
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->findOrFail($id)->delete();
        return redirect()->back();
    }
}
