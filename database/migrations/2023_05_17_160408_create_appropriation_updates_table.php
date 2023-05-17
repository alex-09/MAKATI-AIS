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
        Schema::create('exec_appropriation_updates', function (Blueprint $table) {
            $table->id();
            $table->string('appro_id');
            $table->string('AIPCode');
            $table->string('document_source');
            $table->string('date');
            $table->string('supplemental_no', 17, 3);
            $table->string('realignment_no', 17, 3);
            $table->float('reversion_no', 17, 3);
            $table->float('addition', 17, 3);
            $table->float('deduction', 17, 3);
            $table->float('latest_balance', 17, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appropriation_updates');
    }
};
