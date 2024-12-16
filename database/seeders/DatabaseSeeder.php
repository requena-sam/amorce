<?php

namespace Database\Seeders;

use App\Models\Donator;
use App\Models\Fund;
use App\Models\Transaction;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'test',
        ]);
        User::factory(9)->create();

        Fund::factory(3)
            ->create();

        Transaction::factory()
            ->create([
                'source_id' => Fund::inRandomOrder()->first()->id,
                'destination_id' => Fund::inRandomOrder()->first()->id,
            ]);
        Transaction::factory()
            ->create([
                'source_id' => Fund::inRandomOrder()->first()->id,
            ]);
        Transaction::factory()
            ->create([
                'destination_id' => Fund::inRandomOrder()->first()->id,
            ]);

        Donator::factory(30)
            ->create();


    }
}
