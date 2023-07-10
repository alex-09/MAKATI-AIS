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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_appro_update_report_info`;
        CREATE PROCEDURE `exec_appro_update_report_info` (IN aipcode VARCHAR(250), IN appro VARCHAR(250))
        BEGIN

        SELECT DISTINCT appro_main.appro_id, 
        appro_main.budget_year_id,
        fund_sources.fund_Source,
        exec_appropriation_types.appro_type,
        appro_main.reference_document,
        appro_details.program,
        appro_details.program_code,
        appro_details.project,
        appro_details.project_code,
        appro_details.activity,
        appro_details.activity_code,
        appro_details.activity_description,
        departments.department_name	
        
        FROM exec_appropriation_details as appro_details
        JOIN exec_appropriations as appro_main
        ON appro_main.appro_id = appro_details.appro_id
        JOIN departments
        ON appro_main.department_code_id = departments.department_code
		JOIN fund_sources 
        ON appro_main.fundSource_id = fund_sources.fundSource_id
        JOIN exec_appropriation_types
        ON appro_main.approType_id = exec_appropriation_types.approType_id
        
        where appro_details.appro_id = appro
        AND appro_details.AIPCode = aipcode;

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
        Schema::dropIfExists('exec_appro_update_report_info');
    }
};
