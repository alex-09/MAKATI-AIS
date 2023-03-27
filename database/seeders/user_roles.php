<?php

namespace Database\Seeders;

use App\Models\UserRoles;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class user_roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        UserRoles::insert([
        [
            'user_role' => 'Admin',
            'user_role_id' => '1',
        ],

        [
            'user_role' => 'Approver',
            'user_role_id' => '2',
        ],

        [
            'user_role' => 'Receiver',
            'user_role_id' => '3',
        ],

        [
            'user_role' => 'Encoder',
            'user_role_id' => '4',
        ],

        [
            'user_role' => 'Processor',
            'user_role_id' => '5',
        ],

        [
            'user_role' => 'Bookkeeper',
            'user_role_id' => '6',
        ]
    ]);
    }
}
