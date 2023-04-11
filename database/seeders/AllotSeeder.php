<?php

namespace Database\Seeders;

use App\Models\Allotment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Allotment::create([
            'allot_id' => "test", 
            'budget_year_id' => 3, 
            'fund_source' => 3,
            'appropriation_type' => 3,
            'document_source' => "test",
            'office_code' => 333,
            'program_code_id' => 333,
            'project_code_id' => 333,
            'activity_code_id' => 333
        ]);
    }
}
