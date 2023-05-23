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
        User::create([
            'surname' => "admin",
            'firstname' => "admin", 
            'middlename' => "admin", 
            'userdesignation' => "City Accountant",  
            'position' => "City Accountant", 
            'division' => "admin", 
            'cluster' => "admin", 
            'gender' => "admin", 
            'birthdate' => "admin", 
            'no_bldg_street' => "admin",           
            'barangay' => "admin",   
            'city' => "admin",
            'province' => "admin",
            'email' => "admin@gmail.com",  
            'contactnumber' => "admin",  
            "alternative_contactnumber" => "admin", 
            'module' => "admin",
            'isAdmin'=> null,
            'password' => bcrypt('qwe123'),
        ]);
    }
}
