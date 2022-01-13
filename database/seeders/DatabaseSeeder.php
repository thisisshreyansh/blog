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
use Illuminate\Support\Facades\Storage;
use Faker;

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
        $album = Album::factory()->create();
        $faker = Faker\Factory::create();

        $imagePath = storage_path('app/public/album/'.$album->id.'/images');
        $thumbnailPath = storage_path('app/public/album/'.$album->id.'/thumbnails');

        Storage::makeDirectory('album/'.$album->id.'/images');
        Storage::makeDirectory('album/'.$album->id.'/thumbnails');

        Image::factory()->count(50)->create([
            'name'=>$faker->name(),
            'user_id'=>$user->id,
            'album_id'=>$album->id,
            'path'=>$faker->image($imagePath,640,480,false,null) ,
            'thumbnails'=>$faker->image($thumbnailPath,240,240,false,null) ,
        ]);

    }
}
