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
            $table->unsignedBigInteger('budget_year_id')->nullable();
            $table->string('fund_source');
            $table->string('reference_document');
            $table->unsignedBigInteger('appropriation_type_id')->nullable();
            $table->string('department');
            $table->unsignedBigInteger('department_code_id')->nullable();
            $table->string('status');
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
