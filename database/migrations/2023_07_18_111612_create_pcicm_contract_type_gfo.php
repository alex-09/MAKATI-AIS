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
        Schema::create('pcicm_contract_type_gfo', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id'); //link to DMContractPOS
            $table->string('payee_name');
            $table->date('contract_date');
            $table->string('contract_number');
            $table->string('stock_property_number');
            $table->string('unit');
            $table->string('description');
            $table->string('brand');
            $table->float('quantity', 17, 3);
            $table->float('unit_cost', 17, 3);
            $table->float('total_cost', 17, 3);
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
        Schema::dropIfExists('pcicm_contract_type_gfo');
    }
};
