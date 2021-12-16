<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'konten',
        'judul',
        'thumbnail',
        'uploader'
    ];

    public function userPost()
    {
        return $this->hasOne(UserPost::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'user_post','post_id','user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
