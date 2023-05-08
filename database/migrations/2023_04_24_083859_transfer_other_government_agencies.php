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
        Schema::create('transfer_other_government_agencies', function (Blueprint $table) {
            $table->id();
            $table->string('tf_toga_id');
            $table->string('tr_type')->default('1');
            $table->string('government_type');
            $table->string('agency_name');
            $table->string('document_source');
            $table->string('general_description');
            $table->integer('nadai_no');
            $table->integer('official_receipt_no');
            $table->string('official_receipt_date');
            $table->integer('official_receipt_amount');
            $table->string('nadai_date');
            $table->integer('remarks')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_other_government_agencies');
    }
};
