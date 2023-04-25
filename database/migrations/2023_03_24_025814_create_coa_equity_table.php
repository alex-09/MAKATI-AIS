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
        Schema::create('coa_equity', function (Blueprint $table) {
            $table->id();
            $table->string('account_group');
            $table->string('major_account_group');
            $table->string('sub_major_account_group');
            $table->string('general_ledger_accounts');
            $table->string('sub_ledger_accounts');
            $table->string('sub_sub_ledger_accounts');
            $table->string('account_code');
            $table->string('account_title');
            $table->string('description')->nullable();
            $table->string('status');
            $table->string('date_effectivity');
            $table->string('coa_title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coa_equity');
    }
};
