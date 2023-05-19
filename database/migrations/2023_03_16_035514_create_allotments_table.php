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
            $table->integer('budget_year_id');
            $table->integer('department_code_id');
            $table->string('fundSource_id');
            $table->string('approType_id');
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
