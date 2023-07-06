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
        $procedure = " DROP PROCEDURE IF EXISTS `get_allotment_expense`;
        CREATE PROCEDURE `get_allotment_expense` (IN aipcode VARCHAR(250), IN allot VARCHAR(250))
        BEGIN

        SELECT exec_allotments.appro_id,
        exec_allotments.allot_id,
        exec_appropriation_details.department_code_id,
        exec_appropriation_types.appro_type,
        exec_allotments.AIPCode,
        exec_appropriation_details.activity,
        exec_appropriation_details.activity_code,
        exec_allotments.account_name,
        exec_allotments.account_code,
        exec_appropriation_expenses.latest_appro_amount AS appro_amount,
        exec_allotments.allot_amount,
        exec_allotments.balance,
        exec_allotments.addition,
        exec_allotments.deduction,
        exec_allotments.adjusted_balance,
        exec_allotments.unalloted_balance
        
        FROM exec_allotments
        LEFT JOIN exec_appropriations
            ON exec_appropriations.appro_id = exec_allotments.appro_id
        LEFT JOIN departments
            ON exec_appropriations.department_code_id = departments.department_code
        LEFT JOIN exec_appropriation_types
            ON exec_appropriations.approType_id = exec_appropriation_types.approType_id
        LEFT JOIN exec_appropriation_details
            ON exec_appropriation_details.AIPCode = exec_allotments.AIPCode
            AND exec_appropriation_details.appro_id = exec_allotments.appro_id
        INNER JOIN (
            SELECT appro_id, AIPCode, account_code, latest_appro_amount
            FROM exec_appropriation_expenses
            WHERE created_at = (
                SELECT MAX(created_at)
                FROM exec_appropriation_expenses
                WHERE status = 'Approved'
            )
            AND status = 'Approved'
        ) AS exec_appropriation_expenses
            ON exec_allotments.appro_id = exec_appropriation_expenses.appro_id
            AND exec_allotments.AIPCode = exec_appropriation_expenses.AIPCode
            AND exec_allotments.account_code = exec_appropriation_expenses.account_code


        WHERE exec_allotments.AIPCode = aipcode
        AND exec_allotments.allot_id = allot;


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
        Schema::dropIfExists('get_allotment_expense');
    }
};
