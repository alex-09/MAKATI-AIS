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
        Schema::create('exec_appropriation_details', function (Blueprint $table) {
            $table->id();
            $table->string('appro_id');
            $table->integer('budget_year_id');
            $table->integer('department_code_id');
            $table->string('AIPCode');
            $table->integer('program_code');
            $table->string('program');
            $table->integer('project_code');
            $table->string('project');
            $table->integer('activity_code')->index();
            $table->string('activity');
            $table->string('activity_description');
            $table->float('appro_total', 17, 3)->nullable();
            $table->float('latest_appro_total', 17, 3)->nullable();
            $table->string('type')->default('New');
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appropriation_details');
    }
};
