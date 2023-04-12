<?php

use App\Models\BudgetYear;
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
        Schema::create('appropriations', function (Blueprint $table) {
            $table->id();
            $table->string('appro_id')->index();
            $table->unsignedBigInteger('budget_year_id');
            $table->integer('fund_source');
            $table->string('reference_document');
            $table->string('adjustment_type')->nullable();
            $table->unsignedBigInteger('appropriation_type_id');
            $table->string('department');
            $table->unsignedBigInteger('department_code_id');
            $table->string('supp_budget_num')->nullable();
            $table->string('date_document')->nullable();
            $table->string('status')->nullable();

            $table->foreign('budget_year_id')->references('id')->on('budget_years')->onUpdate('cascade')->onDelete('cascade');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appropriations');
    }
};
