<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'category_id'=>Category::factory(),
            'user_id'=>User::factory(),
            'title' => $this->faker->sentence(),
            'slug'=>$this->faker->slug(),
            'thumbnail'=>$this->faker->image('public/storage/thumbnails',400,300,false,null) ,
            'excerpt' => '<p>'.implode('</p><p>',$this->faker->paragraphs(2)).'</p>',
            'body'=>collect($this->faker->paragraphs(3))->map(fn($item) => "<p>{$item}</p>")->implode(''),
        ];
    }
}
