<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => fake()->numberBetween(1, 10),
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'content' => fake()->text,
            'thumbnail_image' => fake()->imageUrl(640, 480, 'cats', true, 'Faker'),
            'image' => fake()->imageUrl(640, 480, 'cats', true, 'Faker'),
            'is_display' => fake()->boolean,
            'sort_number' => fake()->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
