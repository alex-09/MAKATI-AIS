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
        Schema::create('obligations', function (Blueprint $table) {
            $table->id();
            $table->integer('budget_year_id');
            $table->string('transaction');
            $table->string('department');
            $table->string('fund_source');
            $table->string('processing_slip_no');
            $table->string('program');
            $table->string('project');
            $table->string('cafoa_amount');
            $table->string('activity_id');
            $table->string('purchase_req_no');
            $table->string('payee');
            $table->string('purchase_req_date');
            $table->string('requesting_official');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obligations');
    }
};
