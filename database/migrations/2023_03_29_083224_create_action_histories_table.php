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
        Schema::create('action_histories', function (Blueprint $table) {
            $table->id();
            $table->string('receive_communication_id');
            $table->string('date');
            $table->string('time');
            $table->longText('particulars');
            $table->string('creator');
            $table->timestamps();

            $table->foreign('receive_communication_id')->references('transaction_id_num')->on('receive_communications');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('action_histories');
    }
};
