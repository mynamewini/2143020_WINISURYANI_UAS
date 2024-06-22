<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // CReate 5 categories for cake/bread
        return [
            'name' => $this->faker->unique()->randomElement(['Cake', 'Bread', 'Pastry', 'Doughnut', 'Muffin']),
            'description' => $this->faker->sentence(10),
        ];
    }
}
