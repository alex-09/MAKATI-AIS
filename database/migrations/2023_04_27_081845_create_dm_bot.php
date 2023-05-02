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
            $table->integer('docu_type_id');
            $table->string('transaction_id');
            $table->integer('department_id');
            $table->integer('processing_slip_number');
            $table->string('description');
            $table->integer('amount');
            $table->string('current_bearer');
            $table->string('current_bearer_dept');
            $table->integer('current_bearer_contact_number');
            $table->string('current_bearer_email');
            $table->string('status');
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
