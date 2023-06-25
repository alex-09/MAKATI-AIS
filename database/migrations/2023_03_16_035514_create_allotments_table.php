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
        Schema::create('exec_allotments', function (Blueprint $table) {
            $table->id();
            $table->string('appro_id');
            $table->string('allot_id');
            $table->string('type')->default('New');
            $table->string('budget_year_id');
            $table->string('department_code_id');
            $table->string('AIPCode');
            $table->string('account_name');
            $table->string('account_code');
            $table->float('appro_amount', 17, 3);
            $table->float('allot_amount', 17, 3);
            $table->float('balance', 17, 3);
            $table->float('latest_balance', 17, 3)->nullable();
            $table->string('adjustemt_id')->nullable();
            $table->string('document_source')->nullable();
            $table->string('date')->nullable();
            $table->string('adjustment_type')->nullable();
            $table->string('adjustment_no')->nullable();
            $table->float('addition', 17, 3)->nullable();
            $table->float('deduction', 17, 3)->nullable();
            $table->float('adjusted_balance', 17, 3)->nullable();
            $table->float('unalloted_balance', 17, 3)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allotments');
    }
};
