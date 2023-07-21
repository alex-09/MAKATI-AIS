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
        Schema::create('pcicm_contract_type_ci', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id'); //link to DMContractPOS
            $table->string('payee_name');
            $table->date('contract_date');
            $table->string('contract_number');
            $table->string('item_number');
            $table->string('scope_of_works');
            $table->float('amount_programmed', 17, 3);
            $table->float('percentage_programmed', 17, 3);
            $table->string('contract_entry_type');
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
        Schema::dropIfExists('pcicm_contract_type_ci');
    }
};
