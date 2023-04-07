<?php

namespace Database\Seeders;

use App\Models\ReceiveCommAssignto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReceiveCommunicationAssign extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReceiveCommAssignto::insert([
        [
            'assign_to_type' => 'Financial Reporting Division',
            'cluster' => "Financial Reporting Services"
        ],
        [
            'assign_to_type' => 'Bookkeeping Division',
            'cluster' => "Financial Reporting Services"
        ],
        [
            'assign_to_type' => 'Barangay Account Division',
            'cluster' => "Financial Reporting Services"
        ],
        [
            'assign_to_type' => 'Administrative Division',
            'cluster' => "Administrative and Internal Control Services"
        ],
        [
            'assign_to_type' => 'Payroll Processing and Remittances Division',
            'cluster' => "Administrative and Internal Control Services"
        ],
        [
            'assign_to_type' => 'Processing of Claims and Internal Control Division',
            'cluster' => "Administrative and Internal Control Services"
        ],
    ]);
    }
}
