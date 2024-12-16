<?php

namespace Database\Factories;

use App\Enums\TransactionType;
use App\Enums\TransferType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'amount' => $this->faker->numberBetween(1, 200),
            'source' => 'Donateur',
            'destination' => 'Projet',
            'transfer_type' => collect([TransferType::CSV->value, TransferType::MANUAL->value])->random(),
        ];
    }
}
