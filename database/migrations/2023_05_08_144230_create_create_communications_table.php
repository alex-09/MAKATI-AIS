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
        Schema::create('create_communications', function (Blueprint $table) {
            $table->id();
            $table->string('transac_id');
            $table->string('type');
            $table->string('sender');
            $table->string('subject');
            $table->string('reply_to');
            $table->string('creator');
            $table->string('document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_communications');
    }
};
