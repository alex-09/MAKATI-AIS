<?php

namespace Database\Seeders;

use App\Models\ReceiveCommType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReceiveCommunicationType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReceiveCommType::insert([
        [
            'rc_type' => 'Subpoena'
        ],
        
        [
            'rc_type' => 'Audit Observation Memorandun'
        ],
    
        [
            'rc_type' => 'Clearance from Money and Property Accountability'
        ],
    
        [
            'rc_type' => 'Memorandum'
        ],
    
        [
            'rc_type' => 'Letter'
        ],
    
        [
            'rc_type' => 'Circulars/Guidelines'
        ],
    ]);
    }
}
