<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'Name'=>fake()->word(),
        'image'=>basename(fake()->image(public_path('assests/images/testimonials'))),
        'content'=>fake()->text(),
        'published'=>fake()->boolean(),
        ];
    }
}
