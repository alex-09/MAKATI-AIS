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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_adjust_obligation_expense`;
        CREATE PROCEDURE `exec_adjust_obligation_expense` (IN year VARCHAR(50), IN cafoa VARCHAR(50))
        BEGIN
        
        SELECT exec_appropriation_types.appro_type,
        exec_appropriation_details.activity,
        exec_appropriation_details.activity_code,
        exec_obligation_details.account_title,
        exec_obligation_details.account_code,
        exec_obligation_details.latest_balance,
        exec_obligation_details.addition,
        exec_obligation_details.deduction,
        exec_obligation_details.updated_balance
        
        FROM exec_obligations
        LEFT JOIN exec_obligation_details
        ON exec_obligation_details.obli_id = exec_obligations.obli_id
        LEFT JOIN exec_appropriations
        ON exec_appropriations.appro_id = exec_obligations.appro_id
        LEFT JOIN exec_appropriation_types 
        ON exec_appropriation_types.approType_id = exec_appropriations.approType_id
        LEFT JOIN exec_appropriation_details 
        ON exec_appropriation_details.appro_id = exec_appropriations.appro_id
        AND exec_appropriation_details.AIPCode = exec_obligation_details.AIPCode
        
        WHERE exec_obligations.budget_year_id = year
        AND exec_obligations.cafoa_no = cafoa;

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
        Schema::dropIfExists('exec_adjust_obligation_expense');
    }
};
