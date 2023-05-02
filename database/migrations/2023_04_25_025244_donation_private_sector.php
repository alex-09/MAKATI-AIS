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
        Schema::create('donation_private_sector', function (Blueprint $table) {
            $table->id();
            $table->string('tf_dps_id');
            $table->string('company_name');
            $table->string('document_source');
            $table->string('general_description');
            $table->integer('official_receipt_no');
            $table->string('official_receipt_date');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_private_sector');
    }
};
