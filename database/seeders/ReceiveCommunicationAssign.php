<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReceiveCommAction;
use App\Models\ReceiveCommStatus;
use App\Models\ReceiveCommCluster;
use App\Models\ReceiveCommAssignto;
use App\Models\ReceiveCommRestrict;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            ],
            [
                'assign_to_type' => 'Bookkeeping Division',
            ],
            [
                'assign_to_type' => 'Barangay Account Division',
            ],
            [
                'assign_to_type' => 'Administrative Division',
            ],
            [
                'assign_to_type' => 'Payroll Processing and Remittances Division',
            ],
            [
                'assign_to_type' => 'Processing of Claims and Internal Control Division',
            ],
        ]);

        ReceiveCommAction::insert([
            [
                'action_type' => 'Attend' ,
            ],
            [
                'action_type' => 'Draft a Reply',
            ],
            [
                'action_type' => 'For Filing',
            ],
            [
                'action_type' => 'FYI',
            ],
            [
                'action_type' => 'Handle',
            ],
            [
                'action_type' => 'Others' ,
            ],
            [
                'action_type' => 'Please See Me' ,
            ],
            [
                'action_type' => 'Remind Me' ,
            ],
            
        ]);

        ReceiveCommCluster::insert([
            [
                'cluster_type' => 'Administrative and Internal Control Services' ,
            ],
            [
                'cluster_type' => 'Financial Reporting Services',
            ]
        ]);

        ReceiveCommRestrict::insert([
            [
                'restrict_type' => 'Restricted'  ,
            ],
            [
                'restrict_type' => 'Not Restricted',
            ]
        ]);

        ReceiveCommStatus::insert([
            [
                'status_type' => 'Cancelled',
            ],
            [
                'status_type' => 'Closed',
            ],
            [
                'status_type' => 'For Outgoing',
            ],
            [
                'status_type' => 'Pending',
            ]
        ]);




    }
}
