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
        Schema::create('dm_payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('payee_name');
            $table->string('transac_id');
            $table->string('particulars');
            $table->float('amount', 17, 3);
            $table->string('current_bearer');
            $table->string('current_bearer_dept');
            $table->bigInteger('current_bearer_contact_number');
            $table->string('current_bearer_email');
            $table->string('status');
            $table->timestamps();

            // $table->foreign('payee_name')->references('payee_name')->on('payee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_payment_transactions');
    }
};
