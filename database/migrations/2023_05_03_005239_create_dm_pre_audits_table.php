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
        Schema::create('dm_pre_audits', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->string('payee_name')->index();
            $table->string('particulars');
            $table->float('amount', 17, 3);
            $table->string('current_bearer');
            $table->string('current_bearer_dept');
            $table->string('current_bearer_contact_number');
            $table->string('current_bearer_email');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_pre_audits');
    }
};
