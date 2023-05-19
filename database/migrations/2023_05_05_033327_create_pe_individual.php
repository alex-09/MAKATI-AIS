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
            $table->string('type_of_payee_id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('suffix');
            $table->string('building_no');
            $table->string('lot_no');
            $table->string('street');
            $table->string('barangay');
            $table->string('municipality_city');
            $table->string('province');
            $table->string('country');
            $table->string('zip_code');
            $table->string('tax');
            $table->string('dti');
            $table->string('authorized');
            $table->string('contact');
            $table->string('email');
            $table->string('receiver');
            $table->string('status')->default('For Approval');
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
