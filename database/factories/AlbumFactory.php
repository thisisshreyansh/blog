<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $id = random_int(100, 1000);
        $path = storage_path('app/public/album/'.$id);
        Storage::makeDirectory('album/'.$id);
        return [
            'id'=>$id,
            'user_id'=>User::factory(),
            'name'=>$this->faker->name(),
            'path'=>$this->faker->image($path,640,480,false,null) ,
            'public_status'=>"1",
        ];
    }
}
