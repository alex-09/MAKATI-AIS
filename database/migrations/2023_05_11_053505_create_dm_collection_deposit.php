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
        Schema::create('dm_collection_deposit', function (Blueprint $table) {
            $table->id();
            $table->string('incom_transaction_id_no');
            $table->string('transaction_type');
            $table->string('sender');
            $table->string('fund_source');
            $table->string('rcd_date');
            $table->string('report_no');
            $table->string('cashbook_ref_no');
            $table->string('subject');
            $table->string('amount_collection');
            $table->string('cash');
            $table->string('check');
            $table->string('online');
            $table->string('bearer_name');
            $table->string('address');
            $table->string('department_office');
            $table->string('bearer_contact_no');
            $table->string('status')->nullable();
            $table->string('department')->nullable();
            $table->string('source_document')->nullable();
            $table->string('remarks')->nullable();
            $table->string('og_transmital_no')->nullable();
            $table->string('og_sender')->nullable();
            $table->string('og_received_by')->nullable();
            $table->string('og_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_collection_deposit');
    }
};
