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
            $table->string('budget_year_id');
            $table->string('department_code_id');
            $table->string('AIPCode');
            $table->string('program_code');
            $table->string('program');
            $table->string('project_code');
            $table->string('project'); 
            $table->string('activity_code')->index();
            $table->string('activity');
            $table->string('activity_description');
            $table->float('appro_total', 17, 3)->nullable();
            $table->float('latest_appro_total', 17, 3)->nullable();
            $table->string('type')->default('New');
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
            $table->string('assign_processor')->nullable();
            $table->string('status')->default('On Process');
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
