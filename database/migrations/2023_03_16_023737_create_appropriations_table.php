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
        Schema::create('appropriations', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->string('fund_source');
            $table->string('reference_document');
            $table->string('appropriation_type');
            $table->string('department');
            $table->string('department_code');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appropriations');
    }
};
