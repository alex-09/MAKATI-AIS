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
        Schema::create('tf_obligation_detatils', function (Blueprint $table) {
            $table->id();
            $table->string('tf_obli_id');
            $table->string('type')->default('New');
            $table->string('src_of_tf');
            $table->string('main_fund_title');
            $table->string('company');
            $table->string('sub_fund_title')->nullable();
            $table->float('latest_bal_tf', 17, 6)->nullable();
            $table->string('tf_count_id');
            $table->string('account_title')->nullable();
            $table->string('account_code')->nullable();
            $table->float('latest_balance', 17, 6)->nullable();
            $table->float('balance', 17, 6)->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->default('For Review');
            $table->float('amount_obligated', 17, 6)->nullable();
            $table->float('addition', 17, 6)->nullable(); 
            $table->float('deduction', 17, 6)->nullable(); 
            $table->float('adjusted_obligation', 17, 6)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tf_obligation_detatils');
    }
};
