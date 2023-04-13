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
            'fund_Source' => 'gen_fund'
        ]);

        FundSource::create([
            'fund_Source' => 'speEdu_fund'
        ]);
    }
}
