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
        Schema::create('exec_activities', function (Blueprint $table) {
            $table->id('activity_id');
            $table->integer('budget_year_id');
            $table->integer('department_code_id');
            $table->string('AIPCode');
            $table->integer('program_code_id');
            $table->integer('project_code_id')->index();
            $table->integer('activity_code')->index();
            $table->string('activity');
            $table->string('activity_description');
            $table->string('appro_id');
            $table->float('appro_total', 17, 3)->nullable();
            $table->float('appro_total_add', 17, 6)->nullable();
            $table->float('appro_total_deduct', 17, 6)->nullable();
            $table->string('allot_id')->nullable();
            $table->float('allot_total', 17, 6)->nullable();
            $table->float('allot_balance', 17, 6)->nullable();
            $table->float('total_allot_add', 17, 6)->nullable();
            $table->float('total_allot_deduct', 17, 6)->nullable();
            $table->float('total_allot_adjust_balance', 17, 6)->nullable();
            $table->float('total_unallot_balance', 17, 6)->nullable();
            $table->string('obli_id')->nullable();
            $table->float('total_obli', 17, 6)->nullable();
            $table->float('total_obli_add', 17, 6)->nullable();
            $table->float('total_obli_deduct', 17, 6)->nullable();
            $table->float('total_obli_balance', 17, 6)->nullable();
            $table->string('status')->nullable();
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
