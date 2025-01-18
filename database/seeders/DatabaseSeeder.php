<?php

namespace Database\Seeders;

use App\Enums\DetenteStatus;
use App\Enums\FundType;
use App\Models\Detente;
use App\Models\Donator;
use App\Models\Fund;
use App\Models\Projet;
use App\Models\Transaction;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User Seeding
        User::factory()->create([
            'name' => 'Sam',
            'email' => 'sam@gmail.be',
            'password' => 'samsam',
        ]);
        User::factory()->create([
            'name' => 'Dominique Vilain',
            'email' => 'dominique.vilain@hepl.be',
            'password' => 'ch4nge_th1s',
        ]);
        User::factory()->create([
            'name' => 'Michael Lecerf',
            'email' => 'michael@lecerf.be',
            'password' => 'ch4nge_th1s',
        ]);

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
            ->hasAttached(Donator::factory(['disponibility' => true])->count(9))
            ->create([
                'name' => 'Détente n°1',
                'status' => DetenteStatus::ACTIVE->value,
            ]);

        Detente::factory(5)
            ->hasAttached(Donator::factory(['disponibility' => true])->count(9))
            ->sequence(fn($sequence) => [
                'name' => 'Détente n°' . ($sequence->index + 2),
            ])
            ->create();

        //Donator Seeding
        Donator::factory(3)
            ->create([
                'count_detente' => 1,
                'disponibility' => true,
            ]);
        Donator::factory(3)
            ->create([
                'count_detente' => 2,
                'disponibility' => true,
            ]);
        Donator::factory(20)->create([
            'disponibility' => false,
        ]);

        Donator::factory(20)->create([
            'donations_dates' => $this->generateConsecutiveMonthlyDates(3),
            'is_drawable' => true,
            'count_detente' => null,
            'disponibility' => false,
        ]);
        //Projet Seeding
        Projet::factory(5)->create();
    }

    private function generateConsecutiveMonthlyDates(int $months): array
    {
        $dates = [];
        $startMonth = Carbon::now()->startOfMonth();

        for ($i = 0; $i < $months; $i++) {
            $dates[] = $startMonth->copy()->addMonths($i)->format('Y-m');
        }

        return $dates;
    }
}
