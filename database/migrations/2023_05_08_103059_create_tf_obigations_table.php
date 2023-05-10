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
        Schema::create('tf_obigations', function (Blueprint $table) {
            $table->id();
            $table->string('tf_obli_id');
            $table->string('type')->default('New');
            $table->string('implemeting_office');
            $table->string('particulars');
            $table->string('furs_amount')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('purchase_req_no')->nullable();
            $table->string('purchase_req_date')->nullable();
            $table->string('payee')->nullable();
            $table->string('requesting_official')->nullable();
            $table->string('processer')->nullable();
            $table->string('reviewer')->nullable();
            $table->string('status')->default('For Review');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tf_obigations');
    }
};
