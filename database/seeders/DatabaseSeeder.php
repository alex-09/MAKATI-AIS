<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            
            user_roles::class,
            ReceiveCommunicationType::class,
            ReceiveCommunicationAssign::class,
            BudgetYearSeeder::class,
            UserSeed::class,

        ]);

    }
}
