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
            $table->integer('department_id');
            $table->string('processing_slip_number');
            $table->string('description');
            $table->string('number')->nullable();
            $table->float('amount', 17, 3);
            $table->string('current_bearer');
            $table->string('current_bearer_dept');
            $table->bigInteger('current_bearer_contact_number');
            $table->string('current_bearer_email');
            $table->string('type')->default('New');
            $table->string('furs_id')->nullable();
            $table->string('cafoa_id')->nullable();
            $table->string('processer')->nullable();
            $table->string('reviewer')->nullable();
            $table->string('status')->nullable();
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
