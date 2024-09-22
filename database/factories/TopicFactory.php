<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'topic_title' => fake()->unique()->sentence(5, true, fake()->words(1, true)),
            'published' => fake()->boolean(),
            'trending' => fake()->boolean(),
            'content' => fake()->text(),
            'category_id' => fake()->numberBetween(1, 10),
            'image' => basename(fake()->image(public_path('assests/images/topics'))),
        ];
     
}
}