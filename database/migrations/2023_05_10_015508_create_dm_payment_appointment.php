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
        Schema::create('dm_payment_appointment', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id_no')->unique();
            $table->string('transaction_type');
            $table->string('fund_source');
            $table->string('cafoa_obr');
            $table->string('caf');
            $table->string('department');
            $table->string('payroll_type');
            $table->string('personnel_number');
            $table->string('employment_type');
            $table->integer('amount');
            $table->string('covered_from');
            $table->string('covered_to');
            $table->string('subject');
            $table->string('bearer_name');
            $table->string('bearer_address');
            $table->string('bearer_contact');
            $table->string('bearer_dept');
            $table->string('document');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_payment_appointment');
    }
};
