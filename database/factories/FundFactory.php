<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fund>
 */
class FundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'amount' => $this->faker->randomNumber(5, false),
            'entrance' => $this->faker->randomNumber(5, false),
            'exit' => $this->faker->randomNumber(5, false),
        ];
    }
}
