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
        $entrance = $this->faker->numberBetween(4000,10000);
        return [
            'name' => $this->faker->words(2, true),
            'entrance' => $entrance,
            'exit' => $this->faker->numberBetween(800, $entrance),
        ];
    }
}
