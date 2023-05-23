<?php

namespace Database\Seeders;

use App\Models\DMContractPOTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CPTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DMContractPOTypes::create([
            'cotract_po_type' => 'Contract'
        ]);

        DMContractPOTypes::create([
            'cotract_po_type' => 'PO'
        ]);

        DMContractPOTypes::create([
            'cotract_po_type' => 'Others'
        ]);
    }
}
