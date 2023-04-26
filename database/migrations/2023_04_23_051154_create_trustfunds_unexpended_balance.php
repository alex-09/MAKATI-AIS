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
        Schema::create('trustfunds_unexpended_balance', function (Blueprint $table) {
            $table->id();
            $table->integer('main_fund_id')->unique();
            $table->integer('sub_fund_id')->unique();
            $table->unsignedBigInteger('budget_year_id');
            $table->string('document_source');
            $table->string('general_descript');
            $table->string('legal_basis');
            $table->integer('journal_voucher_no');
            $table->date('journal_voucher_date')->nullable();
            $table->string('main_fund_title');
            $table->string('sub_fund_title');
            $table->string('specific_purpose');
            $table->integer('amount_allocated');
            $table->string('implementing_office');
            $table->string('remarks'); 
            $table->string('file', 255)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trustfunds_unexpended_balance');
    }
};
