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
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);
        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        $blog1= Post::create([
            'user_id'=>$user->id,
            'category_id'=>$personal->id,
            'title' => 'My Persoanl Blog',
            'slug' => 'my-personal-blog',
            'excerpt' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit laborum, alias odit, consequuntur nam deleniti, laudantium nihil voluptatem in cum voluptas.</p>',
            'body' => '<p>Lporem ipsum dolor sit amet consectetur adipisicing elit. Ratione harum laborum adipisci reiciendis possimus magnam ducimus eveniet corporis? Ullam quas dolorum tenetur nam nobis, officia fugiat culpa vitae cumque provident aspernatur inventore assumenda voluptas recusandae accusantium, molestias hic quos vel velit nulla possimus deleniti illum nostrum? Nihil praesentium pariatur, officiis iure quis voluptatibus quibusdam itaque ipsa perspiciatis dolores veniam, exercitationem illo quod ratione, tempore assumenda. Laudantium fuga alias adipisci debitis tempore, nemo libero magni repellat, earum hic quod excepturi. Illo, suscipit eum eos vero cumque sunt fugit nemo qui quam. Neque fugiat saepe ex iste, at nulla possimus dolor pariatur ut cupiditate. At sed nemo fugit, sapiente atque exercitationem harum dicta consequatur aliquid, a dolores provident itaque labore expedita cumque hic neque! Consequatur, sunt?</p>'
        ]);

        $blog2= Post::create([
            'user_id'=>$user->id,
            'category_id'=>$work->id,
            'title' => 'My Work Blog',
            'slug' => 'my-work-blog',
            'excerpt' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit laborum, alias odit, consequuntur nam deleniti, laudantium nihil voluptatem in cum voluptas.</p>',
            'body' => '<p>Lporem ipsum dolor sit amet consectetur adipisicing elit. Ratione harum laborum adipisci reiciendis possimus magnam ducimus eveniet corporis? Ullam quas dolorum tenetur nam nobis, officia fugiat culpa vitae cumque provident aspernatur inventore assumenda voluptas recusandae accusantium, molestias hic quos vel velit nulla possimus deleniti illum nostrum? Nihil praesentium pariatur, officiis iure quis voluptatibus quibusdam itaque ipsa perspiciatis dolores veniam, exercitationem illo quod ratione, tempore assumenda. Laudantium fuga alias adipisci debitis tempore, nemo libero magni repellat, earum hic quod excepturi. Illo, suscipit eum eos vero cumque sunt fugit nemo qui quam. Neque fugiat saepe ex iste, at nulla possimus dolor pariatur ut cupiditate. At sed nemo fugit, sapiente atque exercitationem harum dicta consequatur aliquid, a dolores provident itaque labore expedita cumque hic neque! Consequatur, sunt?</p>'
        ]);

        $blog3= Post::create([
            'user_id'=>$user->id,
            'category_id'=>$family->id,
            'title' => 'My Family Blog',
            'slug' => 'my-family-blog',
            'excerpt' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit laborum, alias odit, consequuntur nam deleniti, laudantium nihil voluptatem in cum voluptas.</p>',
            'body' => '<p>Lporem ipsum dolor sit amet consectetur adipisicing elit. Ratione harum laborum adipisci reiciendis possimus magnam ducimus eveniet corporis? Ullam quas dolorum tenetur nam nobis, officia fugiat culpa vitae cumque provident aspernatur inventore assumenda voluptas recusandae accusantium, molestias hic quos vel velit nulla possimus deleniti illum nostrum? Nihil praesentium pariatur, officiis iure quis voluptatibus quibusdam itaque ipsa perspiciatis dolores veniam, exercitationem illo quod ratione, tempore assumenda. Laudantium fuga alias adipisci debitis tempore, nemo libero magni repellat, earum hic quod excepturi. Illo, suscipit eum eos vero cumque sunt fugit nemo qui quam. Neque fugiat saepe ex iste, at nulla possimus dolor pariatur ut cupiditate. At sed nemo fugit, sapiente atque exercitationem harum dicta consequatur aliquid, a dolores provident itaque labore expedita cumque hic neque! Consequatur, sunt?</p>'
        ]);
    }
}
