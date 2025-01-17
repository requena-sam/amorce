<?php

namespace Database\Factories;

use App\Enums\DetenteStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Enum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detente>
 */
class DetenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Détente n°',
            'status' => $this->faker->randomElement([DetenteStatus::PENDING->value, DetenteStatus::CLOSED->value]),
        ];
    }
}
