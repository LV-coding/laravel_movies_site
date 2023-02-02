<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use App\Models\Type;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Type::factory(8)->create();
        $tags = Tag::factory(20)->create();
        $movies = Movie::factory(1000)->create();

        foreach($movies as $movie) {
            $tags_id = $tags->random(random_int(2,8))->pluck('id');
            $movie->tags()->attach($tags_id);
        }
    }
}
