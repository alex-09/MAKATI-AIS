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
        Schema::create('dm_cpo_headdivision_action', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_no')->index();
            $table->string('payee_name');
            $table->string('contact_no');
            $table->date('contract_date');
            $table->integer('contract_amount');
            $table->string('particulars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_cpo_headdivision_action');
    }
};
