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
        $procedure = " DROP PROCEDURE IF EXISTS `get_allotment_report_realign`;
        CREATE PROCEDURE `get_allotment_report_realign` (IN aipcode VARCHAR(250), IN allot VARCHAR(250))
        BEGIN

        SELECT id,
		account_name,
        account_code,
        adjustment_no,
        adjusted_balance,
        status
        
        FROM exec_allotments

        where allot_id = allot
        AND AIPCode = aipcode
        and adjustment_type = 2;


        END";
        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('get_allotment_report_realign');
    }
};
