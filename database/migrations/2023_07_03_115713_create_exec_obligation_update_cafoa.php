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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_obligation_report_1`;
        CREATE PROCEDURE `exec_obligation_report_1` (IN year VARCHAR(50), IN cafoa VARCHAR(50))
        BEGIN
        
        SELECT account_code, 
        appro_amount, 
        allot_amount, 
        exec_obligation_details.status 

        FROM exec_obligation_details
        LEFT JOIN exec_obligations
        ON exec_obligation_details.obli_id = exec_obligations.obli_id

        WHERE exec_obligations.budget_year_id = year
        AND cafoa_no = cafoa
        group by account_code;

        END";
        DB::unprepared($procedure); 


        $procedure = " DROP PROCEDURE IF EXISTS `exec_obligation_report_2`;
        CREATE PROCEDURE `exec_obligation_report_2` (IN year VARCHAR(50), IN cafoa VARCHAR(50))
        BEGIN
        
        SELECT cafoa_no, 
        account_code, 
        obli_amount, 
        exec_obligation_details.status
        FROM exec_obligation_details
        LEFT JOIN exec_obligations
        ON exec_obligation_details.obli_id = exec_obligations.obli_id
        WHERE exec_obligations.budget_year_id = year
        AND cafoa_no = cafoa;

        END";
        DB::unprepared($procedure); 

        $procedure = " DROP PROCEDURE IF EXISTS `exec_obligation_report_3`;
        CREATE PROCEDURE `exec_obligation_report_3` (IN year VARCHAR(50), IN cafoa VARCHAR(50))
        BEGIN
        
        SELECT account_code,
        appro_amount - allot_amount AS untilized_appro, 
        allot_amount - obli_amount AS untilized_allot

        FROM exec_obligation_details
        LEFT JOIN exec_obligations
        ON exec_obligation_details.obli_id = exec_obligations.obli_id
        
        WHERE exec_obligations.budget_year_id = year
        AND cafoa_no = cafoa
        group by account_code;

        END";
        DB::unprepared($procedure); 

        $procedure = " DROP PROCEDURE IF EXISTS `exec_obligation_report_4`;
        CREATE PROCEDURE `exec_obligation_report_4` (IN year VARCHAR(50), IN cafoa VARCHAR(50))
        BEGIN
        
        SELECT account_code, 
        SUM(appro_amount) AS total_obli from
        exec_obligation_details
        LEFT JOIN exec_obligations
        ON exec_obligation_details.obli_id = exec_obligations.obli_id
        
        WHERE exec_obligations.budget_year_id = year
        AND cafoa_no = cafoa
        group by account_code;

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
        Schema::dropIfExists('exec_obligation_update_cafoa');
    }
};
