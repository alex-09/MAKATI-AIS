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
        Schema::create('pe_business', function (Blueprint $table) {
            $table->id();
            $table->integer('type_of_payee_id');
            $table->string('business_name');
            $table->integer('building_no');
            $table->integer('lot_no');
            $table->string('street');
            $table->string('barangay');
            $table->string('municipality_city');
            $table->string('province');
            $table->string('country');
            $table->integer('zip_code');
            $table->integer('tax_id_no');
            $table->integer('dti_no');
            $table->integer('section_no');
            $table->integer('cda_no');
            $table->string('authorized_rep');
            $table->integer('contact_no');
            $table->string('email');
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
        Schema::dropIfExists('pe_business');
    }
};
