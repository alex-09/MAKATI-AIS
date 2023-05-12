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
        Schema::create('exec_expenses', function (Blueprint $table) {
            $table->id('expenses_id');
            $table->integer('budget_year_id');
            $table->integer('department_code_id');
            $table->string('AIPCode');
            $table->integer('program_code_id');
            $table->integer('project_code_id');
            $table->integer('activity_code_id');
            $table->string('account_name');
            $table->integer('account_code');
            $table->string('appro_id');
            $table->float('appro_amount', 17, 6);
            $table->float('appro_add', 17, 6)->nullable();
            $table->float('appro_deduct', 17, 6)->nullable();
            $table->string('allot_id')->nullable();
            $table->float('allot_amount', 17, 6)->nullable();
            $table->float('balance', 17, 6)->nullable();
            $table->float('allot_add', 17, 6)->nullable();
            $table->float('allot_deduct', 17, 6)->nullable();
            $table->float('allot_adjust_balance', 17, 6)->nullable();
            $table->float('unallot_balance', 17, 6)->nullable();
            $table->float('obli_ammount', 17, 6)->nullable();
            $table->float('obli_add', 17, 6)->nullable();
            $table->float('obli_deduct', 17, 6)->nullable();
            $table->float('obli_adjust_balance', 17, 6)->nullable();
            $table->timestamps();
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
