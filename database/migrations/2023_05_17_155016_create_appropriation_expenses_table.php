<?php

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
        Schema::create('exec_appropriation_expenses', function (Blueprint $table) {
            $table->id();
            $table->string('appro_id');
            $table->string('AIPCode');
            $table->string('account_name');
            $table->integer('account_code');
            $table->float('appro_amount', 17, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appropriation_expenses');
    }
};
