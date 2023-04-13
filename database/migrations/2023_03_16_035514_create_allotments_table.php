<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BudgetYear;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('allotments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('budget_year_id');
            $table->string('allot_id');
            $table->string('appro_id');
            $table->string('adjustment_type')->nullable();
            $table->unsignedBigInteger('department_code_id')->nullable();
            $table->integer('fundSource_id');
            $table->unsignedBigInteger('approType_id');
            $table->string('document_date')->nullable();
            $table->string('document_source');
            $table->string('supplemental_budget_no')->nullable();
            $table->integer('program_code_id');
            $table->integer('project_code_id');
            $table->integer('activity_code_id');
            $table->string('AIPCode');
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->foreign('budget_year_id')->references('id')->on('budget_years')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('appro_id')->references('appro_id')->on('appropriations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('activity_code_id')->references('activity_code')->on('activities')->onUpdate('cascade')->onDelete('cascade');
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
