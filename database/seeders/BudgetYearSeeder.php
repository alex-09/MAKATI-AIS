<?php

namespace Database\Seeders;

use App\Models\BudgetYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BudgetYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BudgetYear::create([
            'year' => '2018'
        ]);

        BudgetYear::create([
            'year' => '2019'
        ]);

        BudgetYear::create([
            'year' => '2020'
        ]);

        BudgetYear::create([
            'year' => '2021'
        ]);

        BudgetYear::create([
            'year' => '2022'
        ]);

        BudgetYear::create([
            'year' => '2023'
        ]);

    }
}
