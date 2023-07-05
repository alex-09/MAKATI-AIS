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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_obligation_view_for_approval`;
        CREATE PROCEDURE `exec_obligation_view_for_approval` (IN obli VARCHAR(50), IN cafoa VARCHAR(50))
        BEGIN
        
        SELECT DISTINCT exec_obligations.id,
        exec_obligations.obli_id,
        exec_obligations.budget_year_id,
        fund_sources.fund_Source,
        departments.department_name,
        transaction,
        processing_slip_no,
        cafoa_amount,
        particulars,
        purchase_req_no,
        purchase_req_date,
        payee,
        requesting_official,
        cafoa_no,
        adjustment_date,
        purchase_contact_date,
        purchase_contact_date,
        program,
        program_code,
        project,
        project_code,
        activity,
        activity_code
        
        FROM 
        exec_obligations
        LEFT JOIN exec_obligation_details
        ON exec_obligation_details.obli_id = exec_obligations.obli_id
        LEFT JOIN exec_appropriation_details
        ON exec_appropriation_details.appro_id = exec_obligations.appro_id
        AND exec_appropriation_details.AIPCode = exec_obligation_details.AIPCode
		LEFT JOIN departments
        ON departments.department_code = exec_obligations.department
        LEFT JOIN fund_sources
        ON fund_sources.fundSource_id = exec_obligations.fund_source

        WHERE exec_obligations.obli_id = obli
        AND cafoa_no = cafoa;

        END";
        DB::unprepared($procedure); 


        $procedure = " DROP PROCEDURE IF EXISTS `exec_obligation_view_expense_for_approval`;
        CREATE PROCEDURE `exec_obligation_view_expense_for_approval` (IN obli VARCHAR(50), IN cafoa VARCHAR(50))
        BEGIN
        
        SELECT account_title,
        account_code,
        appro_amount,
        allot_amount,
        obli_amount,
        balance
        
        FROM exec_obligation_details
        LEFT JOIN exec_obligations
        ON exec_obligations.obli_id = exec_obligation_details.obli_id
        
        WHERE exec_obligations.obli_id = obli
        AND cafoa_no = cafoa;

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
        Schema::dropIfExists('exec_obligation_view');
    }
};
