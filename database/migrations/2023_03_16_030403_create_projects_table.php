<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Program;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('appro_id')->nullable();
            $table->string('program_code_id')->nullable();
            $table->string('project');
            $table->string('project_code')->index();
            $table->timestamps();

            $table->foreign('appro_id')->references('appro_id')->on('appropriations');
            $table->foreign('program_code_id')->references('program_code')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
