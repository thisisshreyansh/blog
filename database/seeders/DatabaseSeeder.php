<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\SharedWith;
use App\Models\User;
use Database\Factories\AlbumFactory;
use Faker\Provider\Lorem;
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
        //avoid hardcoding create
        $user = User::factory()->create();
        Post::factory(5)->create([
            'user_id'=>$user->id
        ]);
        // $album = Album::factory(2)->create([]);
        Image::factory(5)->create([
            'user_id'=>$user->id,
            // 'album_id'=>$album->id,
        ]);

        SharedWith::factory()->create([
            'user_id'=>$user->id,
            // 'album_id'=>$album->id,
        ]);
    }
}
