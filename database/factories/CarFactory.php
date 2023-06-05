<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'         => fake()->title(),
            'passenger'     => 3,
            'ac'            => true,
            'condition'     => 2,
            'description'   => fake()->paragraph(),
            'status'        => true
        ];
    }
}
