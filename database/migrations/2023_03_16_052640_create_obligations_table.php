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
        Schema::create('exec_obligations', function (Blueprint $table) {
            $table->id();
            $table->string('obli_id');
            $table->string('allot_id');
            $table->string('appro_id');
            $table->string('budget_year_id');
            $table->string('transaction');
            $table->string('department');
            $table->string('fund_source');
            $table->string('processing_slip_no')->nullable();
            $table->string('cafoa_amount')->nullable();
            $table->string('particulars')->nullable();
            $table->string('purchase_req_no')->nullable();
            $table->string('purchase_req_date')->nullable();
            $table->string('payee')->nullable();
            $table->string('requesting_official')->nullable();
            $table->string('cafoa_no')->nullable();
            $table->string('adjustment_date')->nullable();
            $table->string('purchase_contact_no')->nullable();
            $table->string('purchase_contact_date')->nullable();
            $table->string('reason')->nullable();
            $table->string('date_process')->nullable();
            $table->string('status')->nullable();;
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
