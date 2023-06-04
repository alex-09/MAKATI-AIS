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
        Schema::create('dm_od_newtransac', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id_no');
            $table->string('particulars');
            $table->string('date');
            $table->string('fund_source');
            $table->string('bearer_name');
            $table->string('department_office');
            $table->string('contact_no');
            $table->string('email');
            $table->string('status')->nullable();
            $table->string('department')->nullable();
            $table->string('document_type')->nullable();
            $table->string('document_no')->nullable();
            $table->string('og_transmital_no')->nullable();
            $table->string('og_sender')->nullable();
            $table->string('og_received_by')->nullable();
            $table->string('og_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_od_newtransac');
    }
};
