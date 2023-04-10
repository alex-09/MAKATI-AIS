<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'Admin',
                'email'=> 'Admin@gmail.com',
                'role_id' => '1',
                'password' => bcrypt('qwe123')
    ]);
        User::create(['name' => 'Approver',
                'email'=> 'Approver@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('qwe123')    
            ]);
        User::create(['name' => 'Receiver',
                'email'=> 'Receiver@gmail.com',
                'role_id' => '3',
                'password' => bcrypt('qwe123')
            ]);
        User::create(['name' => 'Encoder',
                'email'=> 'Encoder@gmail.com',
                'role_id' => '4',
                'password' => bcrypt('qwe123')
            ]);
        User::create(['name' => 'Processor',
                'email'=> 'Processor@gmail.com',
                'role_id' => '5',
                'password' => bcrypt('qwe123')   
            ]);
        User::create(['name' => 'Bookkeeper',
                'email'=> 'Bookkeeper@gmail.com',
                'role_id' => '6',
                'password' => bcrypt('qwe123')   
            ]);
    }
}
