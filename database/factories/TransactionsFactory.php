<?php

namespace Database\Factories;

use App\Enums\TransactionType;
use App\Enums\TransferType;
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
        return [
            'author' => $this->faker->words(2, true),
            'amount' => $this->faker->randomNumber(5, false),
            'donator' => $this->faker->name(),
            'donator_email' => $this->faker->email(),
            'transfer_type' => collect([TransferType::CSV->value, TransferType::MANUAL->value])->random(),
            'transaction_type' => collect([TransactionType::DEPOT->value, TransactionType::RETRAIT->value])->random(),
        ];
    }
}
