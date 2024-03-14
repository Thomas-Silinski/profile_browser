<?php

namespace Database\Factories;

use App\Models\Star;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Star>
 */
class StarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname'   => fake()->firstName,
            'lastname'    => fake()->lastName,
            'image_url'   => fake()->imageUrl,
            'description' => fake()->realText,
        ];
    }
}
