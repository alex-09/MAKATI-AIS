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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_obligation_get_program`;
        CREATE PROCEDURE `exec_obligation_get_program` (IN year VARCHAR(250), IN fundSource VARCHAR(250), IN department VARCHAR(250))
        BEGIN
        
        SELECT DISTINCT exec_appropriation_details.program,
        exec_appropriation_details.program_code, 
        exec_appropriation_details.appro_id
        
        FROM exec_allotments
        LEFT JOIN exec_appropriations
        ON exec_appropriations.appro_id = exec_allotments.appro_id
        LEFT JOIN exec_appropriation_details
        ON exec_appropriations.appro_id = exec_appropriation_details.appro_id
        
        WHERE exec_appropriations.budget_year_id = year
        AND exec_appropriations.fundSource_id = fundSource
        AND exec_appropriations.department_code_id = department
        AND exec_appropriation_details.status = 'Approved';


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
        Schema::dropIfExists('exec_obligation_get_program');
    }
};
