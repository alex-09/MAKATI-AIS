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
            'budget_year_id' => 1, 
            'fund_source' => 1,
            'appropriation_type' => 1,
            'document_source' => "test",
            'program_code_id' => 222,
            'project_code_id' => 222,
            'activity_code_id' => 222
        ]);
    }
}
