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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_adjust_obligation`;
        CREATE PROCEDURE `exec_adjust_obligation` (IN year VARCHAR(250), IN cafoa VARCHAR(250))
        BEGIN
        
        SELECT id,
        budget_year_id,
        fund_source,
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
        purchase_contact_date
        
        FROM 
        exec_obligations
        LEFT JOIN departments
        ON departments.department_code = exec_obligations.department
        WHERE budget_year_id = year
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
        Schema::dropIfExists('exec_adjust_obligation');
    }
};
