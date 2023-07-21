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
        Schema::create('pcicm_contract_type_os_labor_component', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id'); //link to DMContractPOS
            $table->string('payee_name');
            $table->date('contract_date');
            $table->string('item_number');
			$table->string('unit');
			$table->float('quantity', 17, 3);
			$table->string('description');
			$table->float('rate_per_period', 17, 3);
			$table->float('total_cost_per_period', 17, 3);
			$table->float('number_of_period', 17, 3);
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
        Schema::dropIfExists('pcicm_contract_type_services_labor_component');
    }
};
