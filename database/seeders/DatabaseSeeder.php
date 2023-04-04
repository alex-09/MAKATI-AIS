<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ReceiveCommAssignto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            
            user_roles::class,
            ReceiveCommunicationType::class,
            ReceiveCommunicationAssign::class

        ]);

    }
}
