<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $procedure = " DROP PROCEDURE IF EXISTS `exec_get_appropriation`;
        CREATE PROCEDURE `exec_get_appropriation` (IN year INT(20), IN department INT(20), IN fundSource VARCHAR(20), IN program VARCHAR(20),
        IN project VARCHAR(20), IN activity VARCHAR(20))
        BEGIN

        SELECT exec_appropriations.department_code_id, exec_appropriations.approType_id, exec_appropriation_details.activity,
        exec_appropriation_details.AIPCode, exec_appropriation_details.account_name, exec_appropriation_details.account_code,
        exec_appropriation_details.latest_appro_amount, exec_appropriation_details.latest_appro_total
     
        FROM exec_appropriations
        join exec_appropriation_details
        
        where exec_appropriations.budget_year_id = year
        and exec_appropriations.department_code_id = department
        and exec_appropriations.fundSource_id = fundSource
        and exec_appropriation_details.program = program
        and exec_appropriation_details.project = project
        and exec_appropriation_details.activity = activity;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_appropriation_exec_sp');
    }
};
