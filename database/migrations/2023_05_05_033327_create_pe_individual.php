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
        Schema::create('pe_individual', function (Blueprint $table) {
            $table->id();
            $table->integer('type_of_payee_id')->unique();
            $table->string('client_type');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('suffix');
            $table->integer('building_no');
            $table->integer('lot_no');
            $table->string('street');
            $table->string('barangay');
            $table->string('municipality_city');
            $table->string('province');
            $table->string('country');
            $table->integer('zip_code');
            $table->date('date_registered');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pe_individual');
    }
};