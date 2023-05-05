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
        Schema::create('trustfunds_lgu_counterpart', function (Blueprint $table) {
            $table->id();
            $table->string('tf_tlc_id');
            $table->string('tr_type')->default('4');
            $table->string('general_description');
            $table->string('legal_basis');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trustfunds_lgu_counterpart');
    }
};
