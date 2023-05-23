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
        $procedure = " DROP PROCEDURE IF EXISTS `get_appro_ca`;
        CREATE PROCEDURE `get_appro_ca` ()
        BEGIN

        SELECT exec_appropriation_details.id, exec_appropriation_details.appro_id, DATE_FORMAT(exec_appropriation_details.created_at, '%M %d %Y ') as Data, 
            DATE_FORMAT(exec_appropriation_details.created_at, '%h:%i:%s') AS time, exec_appropriations.budget_year_id,
            exec_appropriations.fundSource_id, exec_appropriations.approType_id, departments.department_name, exec_appropriations.department_code_id,
            exec_appropriation_details.program, exec_appropriation_details.project, exec_appropriation_details.activity, exec_appropriation_details.AIPCode,
            exec_appropriation_details.appro_total, exec_appropriation_details.status
        
        from exec_appropriations 
            join exec_appropriation_details
            join departments
            
        where exec_appropriations.appro_id = exec_appropriation_details.appro_id
            and departments.department_code = exec_appropriations.department_code_id
            and exec_appropriation_details.status = 'For Approval - CA';
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_appro_city_acountant');
    }
};
