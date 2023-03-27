<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Project;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('budget_year_id')->nullable();
            $table->unsignedBigInteger('department_code_id')->nullable();
            $table->unsignedBigInteger('program_code_id')->nullable();
            $table->unsignedBigInteger('project_code_id')->nullable();
            $table->string('activity');
            $table->string('activity_code');
            $table->string('activity_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
