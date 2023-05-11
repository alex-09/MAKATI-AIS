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
            $table->string('period_covered');
            $table->date('date_of_collection');
            $table->string('fund_source');
            $table->integer('amount');
            $table->string('description');
            $table->string('bearer_name');
            $table->string('bearer_dept');
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
