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
        Schema::create('exec_allotment_updates', function (Blueprint $table) {
            $table->id();
            $table->string('appro_id');
            $table->string('allot_id');
            $table->string('AIPCode');
            $table->string('document_source');
            $table->string('date');
            $table->string('adjustment_type');
            $table->string('adjustment_no');
            $table->float('balance', 17, 3);
            $table->float('addition', 17, 3);
            $table->float('deduction', 17, 3);
            $table->float('adjusted_balance', 17, 3);
            $table->float('unalloted_balance', 17, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allotment_updates');
    }
};
