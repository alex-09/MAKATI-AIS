<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use App\Models\FundSource;
use Illuminate\Database\Seeder;
use Database\Seeders\PayrollDocuTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            
            ApproTypesSeeder::class,
            FundSourceSeeder::class,
            DeptSeeder::class,
            user_roles::class,
            ReceiveCommunicationType::class,
            ReceiveCommunicationAssign::class,
            BudgetYearSeeder::class,
            UserSeed::class,
            STRSeeder::class,
            CPTypeSeeder::class,
            // AllotSeeder::class,
            PayrollDocuTypeSeeder::class,
            PayrollEmpTypeSeeder::class,
            PayrollFundTypeSeeder::class,
            PayrollTransacTypeSeeder::class

        ]);

    }
}
