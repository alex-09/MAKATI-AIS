<?php

namespace Database\Seeders;

use App\Models\DmPayrollDocuTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PayrollDocuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DmPayrollDocuTypes::create([
            'docu_type' => 'Appointment'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Payroll for Salaries'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Payroll for Overtime'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Payroll for RATA'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Payroll for SALA & Hazard Pay'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Payroll for Mid-Year Bonus'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Payroll for PEI'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Payroll for SRI'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Payroll for Anniversary Bonus'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => ' Payroll for Loyalty Bonus'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Payroll for Monitized Leave'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Payroll for Honoraria'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Payroll for Student Stipend'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Payroll for NGA Allowances'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Payroll for Book and Allowances'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Payroll for PHIC Professional Fees'
        ]);

        DmPayrollDocuTypes::create([
            'docu_type' => 'Others'
        ]);

    }
}
