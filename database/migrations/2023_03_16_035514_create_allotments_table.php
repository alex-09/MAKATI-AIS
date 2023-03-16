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
            $table->foreignIdFor(BudgetYear::class);
            $table->string('adjustment_type');
            $table->string('department');
            $table->string('fund_source');
            $table->string('appropriation_type');
            $table->string('document_date');
            $table->string('document_source');
            $table->string('supplemental_budget_no');
            $table->string('office_code');
            $table->string('program');
            $table->string('project');
            $table->string('activity');
            $table->string('status');
            $table->timestamps();
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
