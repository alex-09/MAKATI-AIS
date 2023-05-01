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
            $table->string('main_fund_title');
            $table->string('sub_fund_title');
            $table->float('amount_allocated', 17, 6)->nullable();
            $table->string('specific_purpose');
            $table->string('implementing_office');
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
