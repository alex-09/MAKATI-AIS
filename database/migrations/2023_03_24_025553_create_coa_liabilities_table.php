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
        Schema::create('coa_liabilities', function (Blueprint $table) {
            $table->id();
            $table->integer('account_group');
            $table->integer('major_account_group');
            $table->integer('sub-major_account_group');
            $table->integer('general_ledger_accounts');
            $table->integer('sub_ledger_accounts');
            $table->integer('sub-sub_ledger_accounts');
            $table->string('account_code');
            $table->string('account_title');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coa_liabilities');
    }
};
