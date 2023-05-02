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
        Schema::create('dm_contractpos', function (Blueprint $table) {
            $table->id();
            $table->integer('cotract_po_id');
            $table->string('transaction_id');
            $table->string('contract_no')->nullable();
            $table->string('po_no')->nullable();
            $table->string('payee_name');
            $table->string('department_id');
            $table->integer('amount');
            $table->string('description');
            $table->string('current_bearer');
            $table->string('current_bearer_dept');
            $table->integer('current_bearer_contact_number');
            $table->string('current_bearer_email');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_contractpos');
    }
};
