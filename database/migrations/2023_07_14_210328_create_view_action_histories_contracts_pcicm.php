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
        $procedure = " DROP VIEW IF EXISTS `view_action_histories_contracts_pcicm`;
        CREATE VIEW `view_action_histories_contracts_pcicm` AS

        SELECT DATE(created_at) AS date,
            TIME(created_at) AS time,
            particulars,
            user
        FROM `action_histories`
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
        Schema::dropIfExists('view_action_histories_contracts_pcicm');
    }
};
