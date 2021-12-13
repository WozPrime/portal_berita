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
        'judul',
        'konten',

    ];
    public function insertData($data)
    {
        try {
            DB::table('posts')
                ->insert($data);
            return 'true';
        } catch (\Exception $e) {
            return 'false';
        }
    }
}
