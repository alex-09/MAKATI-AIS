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
        Schema::create('exec_appropriation_expenses', function (Blueprint $table) {
            $table->id();
            $table->string('appro_id');
            $table->string('AIPCode');
            $table->string('account_name');
            $table->string('account_code');
            $table->float('appro_amount', 17, 3)->nullable();
            $table->float('latest_appro_amount', 17, 3)->nullable();
            $table->string('adjustemt_id')->nullable();
            $table->string('document_source')->nullable();
            $table->string('adjustment_date')->nullable();
            $table->string('adjustment_type')->nullable();
            $table->string('adjustment_no')->nullable();
            $table->float('addition', 17, 3)->nullable();
            $table->float('deduction', 17, 3)->nullable();
            $table->float('balance', 17, 3)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appropriation_expenses');
    }
};
