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
        Schema::create('receive_communications', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id_num', 32);
            $table->string('receive_comm_type_id');
            $table->string('subject');
            $table->string('department')->nullable();
            $table->string('addressee')->nullable();
            $table->string('particulars')->nullable();
            $table->string('email')->nullable();
            $table->string('DRN')->nullable();
            $table->string('reply_to')->nullable();
            $table->string('sender');
            $table->string('contact_no');
            $table->string('bearer_name');
            $table->string('bearer_address')->nullable();
            $table->string('bearer_contact_no');
            $table->string('bearer_department');
            $table->longText('remarks')->nullable();
            $table->longText('reviewer_remarks')->nullable();
            $table->longText('approver_remarks')->nullable();
            $table->string('document')->nullable();
            $table->string('receive_comm_assignto_id')->nullable();
            $table->string('cluster')->nullable();
            $table->string('restriction')->nullable();
            $table->string('action')->nullable();
            $table->string('no_of_days')->default('5');
            $table->string('status')->default('Pending');
            $table->string('og_transmital_no')->nullable();
            $table->string('og_memo_no')->nullable();
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
        Schema::dropIfExists('receive_communications');
    }
};
