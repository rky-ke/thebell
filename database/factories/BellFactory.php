<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bell>
 */
class BellFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1, // This is a placeholder for now, we will fix it later
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(20),
        ];
    }
}
