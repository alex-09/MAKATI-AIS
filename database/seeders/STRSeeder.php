<?php

namespace Database\Seeders;

use App\Models\SRCTrustReceipt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class STRSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SRCTrustReceipt::create([
            'str_name' => 'Transfer from Other Government Agencies"', 
        ]);
        SRCTrustReceipt::create([
            'str_name' => 'Donation from Private Sector', 
        ]);
        SRCTrustReceipt::create([
            'str_name' => 'Unexpended Balance of LDRRMF', 
        ]);
        SRCTrustReceipt::create([
            'str_name' => 'LGU Counterpart Contribution for Specific Projects', 
        ]);
    }
}
