<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DmPayrollFundTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PayrollFundTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DmPayrollFundTypes::create([
            'fund_type' => 'Youth & Sport Development Department'
        ]);

        DmPayrollFundTypes::create([
            'fund_type' => 'Economic Enterprises Management Office'
        ]);
        DmPayrollFundTypes::create([
            'fund_type' => 'OSMAK'
        ]);
        DmPayrollFundTypes::create([
            'fund_type' => 'UMAK'
        ]);
        DmPayrollFundTypes::create([
            'fund_type' => 'Special Educational Fund'
        ]);

        DmPayrollFundTypes::create([
            'fund_type' => 'Trust Fund'
        ]);

        DmPayrollFundTypes::create([
            'fund_type' => 'Bank Loan'
        ]);
    }
}
