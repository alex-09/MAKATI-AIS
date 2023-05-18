<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DmPayrollEmployTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PayrollEmpTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DmPayrollEmployTypes::create([
            'emp_type' => 'Regular'
        ]);

        DmPayrollEmployTypes::create([
            'emp_type' => 'Casual'
        ]);

        DmPayrollEmployTypes::create([
            'emp_type' => 'Contractual'
        ]);

        DmPayrollEmployTypes::create([
            'emp_type' => 'Consultant'
        ]);

        DmPayrollEmployTypes::create([
            'emp_type' => 'Letter'
        ]);

        DmPayrollEmployTypes::create([
            'emp_type' => 'Job Order'
        ]);

        DmPayrollEmployTypes::create([
            'emp_type' => 'Other'
        ]);

    }
}
