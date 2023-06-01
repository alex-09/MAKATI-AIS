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
        Schema::create('ct_receive_checks', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id_num');
            $table->string('payee_name');
            $table->string('tin_no');
            $table->string('dv_no');
            $table->string('dv_date')->nullable();
            $table->string('particulars');
            $table->integer('amount');
            $table->string('fund_source');
            $table->string('cafoa_furs_no');
            $table->string('check_no');
            $table->string('account_no');
            $table->string('date_of_check');
            $table->integer('check_amount');
            $table->string('bearer_name');
            $table->string('department_office');
            $table->string('contact_no');
            $table->string('email');
            $table->string('aa_no')->nullable();
            $table->string('aa_date')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('ct_receive_checks');
    }
};
