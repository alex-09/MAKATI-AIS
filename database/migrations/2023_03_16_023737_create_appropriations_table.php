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
        Schema::create('exec_appropriations', function (Blueprint $table) {
            $table->id();
            $table->string('appro_id')->index();
            $table->string('budget_year_id');
            $table->string('department_code_id');
            $table->string('fundSource_id');
            $table->string('approType_id');
            $table->string('date_document')->nullable();
            $table->string('reference_document');
            $table->string('status')->default('On Process');
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
