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
            $table->integer('incom_transaction_id_no')->unique();
            $table->string('transaction_type');
            $table->string('sender');
            $table->string('fund_source');
            $table->date('rcd_date');
            $table->integer('report_no');
            $table->integer('cashbook_ref_no');
            $table->string('subject');
            $table->integer('amount_collection');
            $table->integer('amount_deposit');
            $table->integer('cash');
            $table->integer('check');
            $table->string('online');
            $table->string('bearer_name');
            $table->string('address');
            $table->string('department_office');
            $table->string('bearer_contact_no');
            $table->string('status');
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
