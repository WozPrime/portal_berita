<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'tema' => 'Sports',
        ]);
        Tag::create([
            'tema' => 'Games',
        ]);
        Tag::create([
            'tema' => 'Music',
        ]);
        Tag::create([
            'tema' => 'Entertainment',
        ]);
        Tag::create([
            'tema' => 'IT',
        ]);
    }
}
