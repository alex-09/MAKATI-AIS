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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_obligation_get_project `;
        CREATE PROCEDURE `exec_obligation_get_project` (IN appro VARCHAR(50), IN program VARCHAR(50))
        BEGIN
        
        SELECT DISTINCT exec_appropriation_details.project, 
        exec_appropriation_details.project_code, 
        exec_appropriation_details.appro_id
        
        FROM exec_allotments
        LEFT JOIN exec_appropriations
        ON exec_appropriations.appro_id = exec_allotments.appro_id
        LEFT JOIN exec_appropriation_details
        ON exec_appropriations.appro_id = exec_appropriation_details.appro_id
        
        WHERE exec_appropriations.appro_id = appro
        AND exec_appropriation_details.program_code = program;


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
        Schema::dropIfExists('exec_obligation_get_project');
    }
};
