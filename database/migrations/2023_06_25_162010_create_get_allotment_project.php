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
        $procedure = " DROP PROCEDURE IF EXISTS `get_allotment_project`;
        CREATE PROCEDURE `get_allotment_project` (IN program VARCHAR(50), IN allot VARCHAR(50))
        BEGIN

        SELECT exec_appropriation_details.project,
        exec_appropriation_details.project_code,
        allot_id
        
        FROM exec_allotments
        LEFT JOIN exec_appropriation_details
        ON exec_appropriation_details.AIPcode = exec_allotments.AIPcode
        AND exec_appropriation_details.appro_id = exec_allotments.appro_id
        
        WHERE exec_appropriation_details.program_code = program
        AND exec_allotments.allot_id = allot
        
        GROUP BY exec_appropriation_details.project,
        exec_appropriation_details.project_code

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
        Schema::dropIfExists('get_allotment_project');
    }
};
