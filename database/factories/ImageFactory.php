<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Album;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'name'=>$this->faker->name(),
            // 'path'=>$this->faker->image('public/storage/public/album/',640,480,false,null) ,
            // 'thumbnails'=>$this->faker->image('public/storage/public/album/',240,240,false,null) ,
            // 'user_id'=>User::factory(),
            // 'album_id'=>Album::factory(),
        ];
    }
}
