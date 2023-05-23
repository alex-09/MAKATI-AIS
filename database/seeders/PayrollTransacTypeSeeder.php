<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DmPayrollTransacTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PayrollTransacTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DmPayrollTransacTypes::create([
            'transac_type' => 'Appointment'
        ]);

        DmPayrollTransacTypes::create([
            'transac_type' => 'Payroll'
        ]);

        DmPayrollTransacTypes::create([
            'transac_type' => 'Others'
        ]);
    }
}
