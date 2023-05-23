<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeOfAdjustment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdjustmentType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeOfAdjustment::create([
            'adjustment_type' => 'Supplemtal budget'
        ]);

        TypeOfAdjustment::create([
            'adjustment_type' => 'Realignment'
        ]);
        
        TypeOfAdjustment::create([
            'adjustment_type' => 'Revision'
        ]);
    }
}
