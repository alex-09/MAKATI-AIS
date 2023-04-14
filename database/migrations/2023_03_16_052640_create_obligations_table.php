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
            $table->integer('transaction');
            $table->unsignedBigInteger('department');
            $table->integer('fund_source');
            $table->string('processing_slip_no');
            $table->integer('cafoa_amount');
            $table->string('particulars');
            $table->string('purchase_req_no');
            $table->date('purchase_req_date');
            $table->string('payee');
            $table->string('requesting_official');
            $table->string('cafoa_no');
            $table->date('adjustment_date');
            $table->string('purchase/contact_no');
            $table->date('purchase/contact_date');
            $table->string('reason');
            $table->date('date_process');
            $table->string('obli_id');
            $table->string('program_code_id');
            $table->string('project_code_id');
            $table->string('activity_code_id');
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
