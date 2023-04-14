<?php

namespace Database\Seeders;

use App\Models\AppropriationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApproTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppropriationType::create([
            'appro_type' => 'current_appro'
        ]);

        AppropriationType::create([
            'appro_type' => 'continue_appro'
        ]);
    }
}
