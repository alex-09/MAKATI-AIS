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
        Schema::create('pcicm_processed_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id'); //foreign key
            $table->string('contract_type');
            $table->date('contract_date');
            $table->float('contract_amount', 17, 3);
            $table->string('contract_number');
            $table->string('procurement');
            $table->string('purchase_req_no');
            $table->string('cost_estimate_num');
            $table->string('project_name');
            $table->string('payee_name');
            $table->string('payee_address');
            $table->string('name_of_authorized');
            $table->string('payee_designation');
            $table->string('payee_contact_number');
            $table->string('company_tin');
            $table->string('place_of_delivery');
            $table->string('payment_terms');
            $table->string('assign_to'); //assign to user
            $table->string('status'); //assign to CA,DH,Processor
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
        Schema::dropIfExists('pcicm_processed_contracts');
    }
};
