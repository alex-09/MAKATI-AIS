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
            $table->integer('budget_year_id');
            $table->integer('department_code_id');
            $table->string('AIPCode');
            $table->string('account_name');
            $table->integer('account_code');
            $table->float('allot_amount', 17, 6);
            $table->float('balance', 17, 6);
            $table->float('latest_balance', 17, 6);
            $table->float('unalloted_balance', 17, 6);
            $table->string('type')->default('New');
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
