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
        Schema::create('create_communications', function (Blueprint $table) {
            $table->id();
            $table->string('transac_id')->nullable();
            $table->string('receive_comm_type_id');
            $table->string('mc_no');
            $table->string('sender');
            $table->string('subject');
            $table->string('reply_to');
            $table->string('creator');
            $table->string('document')->nullable();
            $table->string('department')->nullable();
            $table->string('addressee')->nullable();
            $table->string('particulars')->nullable();
            $table->longText('remarks')->nullable();
            $table->longText('receive_comm_assignto_id')->nullable();
            $table->string('cluster')->nullable();
            $table->string('restriction')->nullable();
            $table->string('action')->nullable();
            $table->string('no_of_days')->nullable();
            $table->string('status')->default('For Outgoing')->nullable();
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
        Schema::dropIfExists('create_communications');
    }
};
