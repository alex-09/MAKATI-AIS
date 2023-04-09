<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Activity;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id('expenses_id');
            $table->string('appro_id');
            $table->integer('program_code_id');
            $table->integer('project_code_id');
            $table->integer('activity_code_id');
            $table->string('account_name');
            $table->integer('account_code');
            $table->float('appropriation_amount', 15, 6);
            $table->float('addition', 15, 6)->nullable();
            $table->float('deduction', 15, 6)->nullable();
            $table->timestamps();

            $table->foreign('appro_id')->references('appro_id')->on('appropriations');
            $table->foreign('program_code_id')->references('program_code')->on('programs');
            $table->foreign('project_code_id')->references('project_code')->on('projects');
            $table->foreign('activity_code_id')->references('activity_code')->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
