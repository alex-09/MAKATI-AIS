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
        $procedure = " DROP PROCEDURE IF EXISTS `get_allotment_program`;
        CREATE PROCEDURE `get_allotment_program` (IN year VARCHAR(50), IN appro_type VARCHAR(50), IN department VARCHAR(50))
        BEGIN

        SELECT exec_appropriation_details.program, 
        exec_appropriation_details.program_code,
        exec_allotments.allot_id
        
        FROM exec_allotments
        LEFT JOIN exec_appropriations
        ON exec_appropriations.appro_id = exec_allotments.appro_id
        LEFT JOIN departments
        ON exec_appropriations.department_code_id = departments.department_code
        LEFT JOIN exec_appropriation_details
        ON exec_appropriation_details.AIPcode = exec_allotments.AIPcode
        AND exec_appropriation_details.appro_id = exec_allotments.appro_id
        
        WHERE exec_appropriations.budget_year_id = year
        AND exec_appropriations.approType_id = appro_type
        AND exec_appropriations.department_code_id = department
        
        GROUP BY exec_appropriation_details.program, 
        exec_appropriation_details.program_code;

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
        Schema::dropIfExists('get_allotment_program');
    }
};
