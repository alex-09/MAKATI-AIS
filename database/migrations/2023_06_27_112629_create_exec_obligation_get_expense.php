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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_obligation_get_expense `;
        CREATE PROCEDURE `exec_obligation_get_expense` (IN appro VARCHAR(50), IN aipcode VARCHAR(50))
        BEGIN
        
        SELECT DISTINCT exec_allotments.id,
        exec_allotments.allot_id,
        exec_allotments.appro_id,
        exec_allotments.AIPCode,
        exec_allotments.account_name, 
        exec_allotments.account_code, 
        exec_allotments.appro_amount, 
        exec_allotments.allot_amount
        
        FROM exec_allotments
        LEFT JOIN exec_appropriation_details
        ON exec_allotments.appro_id = exec_appropriation_details.appro_id
        AND exec_allotments.AIPCode = exec_appropriation_details.AIPCode
        
        WHERE exec_allotments.appro_id = appro
        AND exec_allotments.AIPCode = aipcode;


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
        Schema::dropIfExists('exec_obligation_get_expense');
    }
};
