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
        Schema::create('tf_fund_details', function (Blueprint $table) {
            $table->id();
            $table->string('tf_id');
            $table->integer('tr_type');
            $table->string('main_fund_title');
            $table->string('sub_fund_title');
            $table->float('amount_allocated', 17, 6)->nullable();
            $table->string('specific_purpose');
            $table->string('implementing_office');
            $table->string('reference')->nullable(); 
            $table->string('update_reasons')->nullable(); 
            $table->float('latest_balance', 17, 6)->nullable(); 
            $table->float('addition', 17, 6)->nullable(); 
            $table->float('deduction', 17, 6)->nullable(); 
            $table->float('updated_balance', 17, 6)->nullable(); 
            $table->string('processor')->nullable(); 
            $table->string('reviewer')->nullable(); 
            $table->integer('type')->default('1'); 
            $table->string('status')->default('1'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tf_fund_details');
    }
};
