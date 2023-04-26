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
            $table->string('company_name');
            $table->integer('main_fund_id');
            $table->integer('sub_fund_id');
            $table->string('document_source');
            $table->string('general_description');
            $table->integer('official_receipt_no');
            $table->string('official_receipt_date');
            $table->string('main_fund_title');
            $table->string('sub_fund_title');
            $table->string('specific_purpose');
            $table->string('amount_allocated');
            $table->string('implementing_office');
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
