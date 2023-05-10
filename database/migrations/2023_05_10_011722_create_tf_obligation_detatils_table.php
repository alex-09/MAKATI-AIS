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
            $table->string('latest_bal_tf')->nullable();
            $table->string('account_title')->nullable();
            $table->string('account_code')->nullable();
            $table->string('amount_obligated')->nullable();
            $table->string('balance')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->default('For Review');
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
