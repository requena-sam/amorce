<?php

namespace Database\Factories;

use App\Enums\TransactionType;
use App\Enums\TransferType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transactions>
 */
class TransactionsFactory extends Factory
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
            'giver' => $this->faker->name(),
            'giver_email' => $this->faker->email(),
            'transfer_type' => collect([TransferType::CSV->value, TransferType::MANUAL->value])->random(),
            'transaction_type' => collect([TransactionType::DEPOT->value, TransactionType::RETRAIT->value])->random(),
        ];
    }
}
