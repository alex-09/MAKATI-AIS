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
            $table->string('payee_name');
            $table->integer('tin_no');
            $table->integer('dv_no');
            $table->string('particulars');
            $table->integer('amount');
            $table->string('fund_source');
            $table->integer('cafoa_furs_no');
            $table->integer('check_no');
            $table->integer('account_no');
            $table->date('date_of_check');
            $table->integer('check_amount');
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
        Schema::dropIfExists('ct_receive_checks');
    }
};
