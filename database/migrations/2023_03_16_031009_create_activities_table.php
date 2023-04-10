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
            $table->string('allot_id')->nullable();
            $table->integer('program_code_id');
            $table->integer('project_code_id');
            $table->string('activity');
            $table->integer('activity_code')->index();
            $table->string('activity_description');
            $table->float('appro_total', 17, 3)->nullable();
            $table->float('appro_total_add', 17, 6)->nullable();
            $table->float('appro_total_deduct', 17, 6)->nullable();
            $table->float('allot_total', 17, 6)->nullable();
            $table->float('balance', 17, 6)->nullable();
            $table->float('total_allot_add', 17, 6)->nullable();
            $table->float('total_allot_deduct', 17, 6)->nullable();
            $table->float('total_allot_adjust_balance', 17, 6)->nullable();
            $table->float('total_unallot_balance', 17, 6)->nullable();
            $table->float('total_obli', 17, 6)->nullable();
            $table->timestamps();

            $table->foreign('appro_id')->references('appro_id')->on('appropriations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('program_code_id')->references('program_code')->on('programs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('project_code_id')->references('project_code')->on('projects')->onUpdate('cascade')->onDelete('cascade');
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
