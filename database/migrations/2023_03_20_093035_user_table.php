<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
 
            $table->id();                           
            $table->string('surname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('userdesignation');    
            $table->string('position');   
            $table->string('division');   
            $table->string('cluster');   
            $table->string('gender'); 
            $table->string('birthdate'); 
            $table->string('no_bldg_street');             
            $table->string('barangay');     
            $table->string('city');  
            $table->string('province');  
            $table->string('email');    
            $table->string('contactnumber');    
            $table->string("alternative_contactnumber");
            $table->string('module');
            $table->boolean('isAdmin')->nullable();
            $table->timestamp('email_verified_at')->nullable(); 
            $table->string('password')->nullable();             
            $table->rememberToken();               
            $table->timestamps();           
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
