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
            $table->id('activity_id');
            $table->string('appro_id');
            $table->integer('program_code_id');
            $table->integer('project_code_id');
            $table->string('activity');
            $table->integer('activity_code')->index();
            $table->string('activity_description');
            $table->float('total_exp_amount', 15, 3)->nullable();
            $table->float('total_addition', 15, 6)->nullable();
            $table->float('total_deduction', 15, 6)->nullable();
            $table->timestamps();

            $table->foreign('appro_id')->references('appro_id')->on('appropriations');
            $table->foreign('program_code_id')->references('program_code')->on('programs');
            $table->foreign('project_code_id')->references('project_code')->on('projects');
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
