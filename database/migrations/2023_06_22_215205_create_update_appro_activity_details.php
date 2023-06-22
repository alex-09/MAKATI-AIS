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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_appro_getinfo`;
        CREATE PROCEDURE `exec_appro_getinfo` (IN aipcode VARCHAR(50), IN appro VARCHAR(50))
        BEGIN

        SELECT activity, activity_code, exec_appropriations.appro_id, AIPCode

        FROM exec_appropriation_expenses as expenses
        RIGHT JOIN exec_appropriations as main_info
        ON expenses.appro_id = main_info.appro_id
        JOIN exec_appropriation_details AS appro_details
        ON appro_details.appro_id = expenses.appro_id
        WHERE appro_details.AIPCode = expenses.AIPCode
        AND expenses.AIPCode = aipcode
        AND expenses.appro_id = appro;

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
        Schema::dropIfExists('update_appro_activity_details');
    }
};
