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
            $table->string('tf_tub_id');
            $table->string('tr_type')->default('3');
            $table->unsignedBigInteger('budget_year_id');
            $table->string('document_source');
            $table->string('general_description');
            $table->string('legal_basis');
            $table->integer('journal_voucher_no');
            $table->string('journal_voucher_date')->nullable();
            $table->string('remarks'); 
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
