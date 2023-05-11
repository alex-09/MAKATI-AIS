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
        Schema::create('dm_od_previoustransac', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_id_no')->unique();
            $table->string('particulars');
            $table->date('date');
            $table->string('fund_source');
            $table->string('bearer_name');
            $table->string('department_office');
            $table->integer('contact_no');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_od_previoustransac');
    }
};
