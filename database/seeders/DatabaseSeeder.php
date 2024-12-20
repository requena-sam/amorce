<?php

namespace Database\Seeders;

use App\Enums\DetenteStatus;
use App\Models\Detente;
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
        //User Seeding
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'test',
        ]);
        User::factory(9)->create();


        //Fund Seeding
        Fund::factory(3)
            ->create();


        //Transaction Seeding
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


        //Detente Seeding
        Detente::factory()
            ->hasAttached(Donator::factory()->count(9), fn() => [
                'disponibility' => 'available'
            ])
            ->create([
                'name' => 'Détente n°1',
                'status' => DetenteStatus::ACTIVE->value,
            ]);
        Detente::factory(5)
            ->hasAttached(Donator::factory()->count(9), fn() => [
                'disponibility' => 'available'
            ])
            ->create();

    }
}
