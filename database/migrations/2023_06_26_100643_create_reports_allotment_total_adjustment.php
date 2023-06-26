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
        $procedure = " DROP PROCEDURE IF EXISTS `get_allotment_reports_total_adjustment`;
        CREATE PROCEDURE `get_allotment_reports_total_adjustment` (IN aipcode VARCHAR(50), IN allot VARCHAR(50))
        BEGIN

        SELECT account_code, SUM(adjusted_balance)

        FROM exec_allotments
        
        WHERE AIPCode = aipcode
        AND allot_id = allot
        
        GROUP BY account_code;


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
        Schema::dropIfExists('get_allotment_reports_total_adjustment');
    }
};
