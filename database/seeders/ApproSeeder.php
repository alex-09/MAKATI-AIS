<?php

namespace Database\Seeders;

use App\Models\Appropriation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApproSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Appropriation::create([
            'appro_id' => 'test',
            'budget_year_id' => 1,
            'fund_source' => 1,
            'reference_document' => 'test',
            'appropriation_type_id' => 1,
            'department' => 'test',
            'department_code_id' => 1,
            'status' => null
        ]);
    }
}
