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
            $table->string('department')->nullable();
            $table->string('pay_status')->nullable();
            $table->string('og_transmital_no')->nullable();
            $table->string('og_sender')->nullable();
            $table->string('og_received_by')->nullable();
            $table->string('og_date')->nullable();
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
