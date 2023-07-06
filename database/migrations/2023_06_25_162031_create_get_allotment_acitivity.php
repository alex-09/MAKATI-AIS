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
        $procedure = " DROP PROCEDURE IF EXISTS `get_allotment_acitivity`;
        CREATE PROCEDURE `get_allotment_acitivity` (IN project VARCHAR(250), IN allot VARCHAR(250))
        BEGIN

        SELECT DISTINCT exec_appropriation_details.activity,
        exec_appropriation_details.activity_code,
        exec_allotments.AIPCode,
        allot_id
        
        FROM exec_allotments
        LEFT JOIN exec_appropriation_details
        ON exec_appropriation_details.AIPcode = exec_allotments.AIPcode
        AND exec_appropriation_details.appro_id = exec_allotments.appro_id
        
        WHERE exec_appropriation_details.project = project
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
        Schema::dropIfExists('get_allotment_acitivity');
    }
};
