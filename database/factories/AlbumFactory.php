<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'album_name'=>$this->faker->name(),
            'album_cover'=>$this->faker->image('public/storage/public',640,480,false,null) ,
            'public_status'=>"0",
        ];
    }
}
