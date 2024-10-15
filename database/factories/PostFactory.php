<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(9);
        $slug = Str::slug($title);
        return [
            'title'=>  $title,
            'body'=> $this->faker->paragraph(255,true),
            'slug' =>  $slug ,
            'image' => $this->faker->imageUrl(640, 480, 'nature', true, 'Faker'),
            'class_id'=>9,
            'user_id'=>1,
            'category_id'=>rand(1,4),
            'status'=>'published',
        ];
    }
}
