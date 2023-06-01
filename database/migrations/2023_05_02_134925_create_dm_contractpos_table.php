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
            $table->string('transaction_id')->index();
            $table->string('type')->nullable();
            $table->string('contract_no')->nullable();
            $table->string('po_no')->nullable();
            $table->string('po_date')->nullable();
            $table->string('payee_name');
            $table->integer('department_id');
            $table->float('amount', 17, 3);
            $table->string('description');
            $table->string('current_bearer');
            $table->string('current_bearer_dept');
            $table->string('current_bearer_contact_number');
            $table->string('current_bearer_email');
            $table->string('assign_to')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('dm_contractpos');
    }
};
