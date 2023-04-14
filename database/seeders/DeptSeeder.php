<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'department_name' => 'Office of the Mayor',
            'department_code' => '2010'
        ]);

        Department::create([
            'department_name' => 'Accounting',
            'department_code' => '2020'
        ]);

        Department::create([
            'department_name' => 'Finance',
            'department_code' => '2030'
        ]);
    }
}
