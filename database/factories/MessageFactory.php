<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'message' => $this->faker->sentence(),
            'is_read' => $this->faker->boolean(),
            'user_id' => $this->faker->numberBetween(1, 10), // Assuming you have a 'users' table
        ];
    }
}