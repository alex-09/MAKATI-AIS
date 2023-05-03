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
        Schema::create('dm_pre_audits', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->string('payee_name');
            $table->string('particulars');
            $table->integer('amount');
            $table->string('current_bearer');
            $table->string('current_bearer_dept');
            $table->integer('current_bearer_contact_number');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('transaction_id')->references('transaction_id')->on('dm_contractpos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_pre_audits');
    }
};
