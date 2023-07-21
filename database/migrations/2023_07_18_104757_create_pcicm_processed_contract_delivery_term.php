<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcicm_processed_contracts_delivery_term', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id'); //foreign key
            $table->string('particulars');
            $table->string('delivery_term');
            $table->date('due_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pcicm_processed_contracts_delivery_term');
    }
};
