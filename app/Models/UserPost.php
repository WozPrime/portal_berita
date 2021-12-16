<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    use HasFactory;
    protected $table = 'user_post';
    protected $primaryKey = 'post_id';

    protected $fillable = [
        'user_id',
        'post_id',
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }


    public function users()
    {
        return $this->hasMany(User::class);
    }

}
