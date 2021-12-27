<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        //avoid hardcoding 
        $user = User::factory()->create();
        Post::factory(5)->create([
            'user_id'=>$user->id
        ]);
    }
}
