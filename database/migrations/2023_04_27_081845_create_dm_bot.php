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
        Schema::create('dm_bot', function (Blueprint $table) {
            $table->id();
            $table->string('docu_type_id');
            $table->string('transaction_id');
            $table->string('department_id');
            $table->string('processing_slip_number');
            $table->string('description');
            $table->string('number')->nullable();
            $table->float('amount', 17, 3);
            $table->string('current_bearer');
            $table->string('current_bearer_dept');
            $table->string('current_bearer_contact_number');
            $table->string('current_bearer_email');
            $table->string('transaction_type')->nullable();
            $table->string('furs_id')->nullable();
            $table->string('cafoa_id')->nullable();
            $table->string('processer')->nullable();
            $table->string('reviewer')->nullable();
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
        Schema::dropIfExists('dm_bot');
    }
};
