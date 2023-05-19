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
        Schema::create('pe_government_agency', function (Blueprint $table) {
            $table->id();
            $table->string('type_of_payee_id');
            $table->string('agency_name');
            $table->string('building_no');
            $table->string('lot_no');
            $table->string('street');
            $table->string('barangay');
            $table->string('municipality_city');
            $table->string('province');
            $table->string('country');
            $table->string('zip_code');
            $table->string('tax_id_no');
            $table->string('authorized_rep');
            $table->string('contact_no');
            $table->string('email');
            $table->string('date_registered');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pe_government_agency');
    }
};
