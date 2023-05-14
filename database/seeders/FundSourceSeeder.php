<?php

namespace Database\Seeders;

use App\Models\FundSource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FundSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FundSource::create([
            'fund_Source' => 'General Fund'
        ]);

        FundSource::create([
            'fund_Source' => 'Special Education Fund'
        ]);
    }
}
