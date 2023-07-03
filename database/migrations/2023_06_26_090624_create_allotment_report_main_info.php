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
        $procedure = " DROP PROCEDURE IF EXISTS `get_allotment_report_main_info`;
        CREATE PROCEDURE `get_allotment_report_main_info` (IN aipcode VARCHAR(50), IN allot VARCHAR(50))
        BEGIN

        SELECT DISTINCT exec_appropriations.budget_year_id,
        exec_appropriations.fundSource_id,
		departments.department_name,
        exec_appropriation_types.appro_type,
        exec_appropriation_details.program,
        exec_appropriation_details.program_code,
        exec_appropriation_details.project,
        exec_appropriation_details.project_code,
        exec_appropriation_details.activity,
        exec_appropriation_details.activity_code,
        exec_appropriation_details.activity_description
        
        FROM  exec_allotments
        LEFT JOIN exec_appropriations
        ON exec_appropriations.appro_id = exec_allotments.appro_id
        LEFT JOIN departments
        ON exec_appropriations.department_code_id = departments.department_code
        LEFT JOIN exec_appropriation_types
		ON exec_appropriations.approType_id = exec_appropriation_types.approType_id
		LEFT JOIN exec_appropriation_details
		ON exec_appropriation_details.appro_id = exec_appropriations.appro_id
        AND exec_appropriation_details.AIPCode = exec_allotments.AIPCode
        
        WHERE exec_allotments.allot_id = allot
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
        Schema::dropIfExists('get_allotment_report_main_info');
    }
};