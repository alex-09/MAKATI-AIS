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
        $procedure = " DROP VIEW IF EXISTS `view_processed_contracts_pcicm`;
        CREATE VIEW `view_processed_contracts_pcicm` AS

        SELECT DATE(pcicm_processed_contracts.created_at) AS date,
            pcicm_processed_contracts.transaction_id,
            payee_name,
            GROUP_CONCAT(particulars) AS particulars,
            contract_amount,
            contract_date,
            contract_number,
            contract_type,
            assign_to,
            status
        FROM `pcicm_processed_contracts`
        LEFT JOIN `pcicm_processed_contracts_delivery_term`
        ON pcicm_processed_contracts.transaction_id = pcicm_processed_contracts_delivery_term.transaction_id
        GROUP BY date, transaction_id, payee_name, contract_amount, contract_date, contract_number, contract_type,  assign_to, status
        ";

        DB::unprepared($procedure); 
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_processed_contracts_pcicm');
    }
};
