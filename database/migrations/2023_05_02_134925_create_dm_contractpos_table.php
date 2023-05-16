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
            $table->unsignedBigInteger('cotract_po_id');
            $table->string('transaction_id')->index();
            $table->string('contract_no')->nullable();
            $table->string('po_no')->nullable();
            $table->string('payee_name');
            $table->integer('department_id');
            $table->integer('amount', 50);
            $table->string('description');
            $table->string('current_bearer');
            $table->string('current_bearer_dept');
            $table->integer('current_bearer_contact_number', 50);
            $table->string('current_bearer_email');
            $table->string('assign_to')->nullable();
            $table->string('status');
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
