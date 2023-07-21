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
        $procedure = " DROP VIEW IF EXISTS `view_for_process_contracts_pcicm`;
        CREATE VIEW `view_for_process_contracts_pcicm` AS

        SELECT DATE(created_at) AS date,
            transaction_id AS number,
            payee_name AS payee,
            description AS particulars,
            amount AS 'contract amount',
            contract_no AS 'contract number',
            type AS 'type of contract',
            assign_to AS 'assign to',
            status
        FROM `dm_contractpos`
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
        Schema::dropIfExists('view_for_process_contracts_pcicm');
    }
};
