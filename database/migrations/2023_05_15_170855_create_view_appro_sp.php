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
        CREATE PROCEDURE `get_appro_ca` (IN app_id VARCHAR(20), IN aip_code VARCHAR(20))
        BEGIN

        SELECT exec_appropriation_details.id, exec_appropriation_details.appro_id, exec_appropriations.budget_year_id, 
        exec_appropriations.fundSource_id, exec_appropriations.reference_document, exec_appropriations.approType_id, departments.department_name, 
        exec_appropriations.department_code_id, exec_appropriation_details.program, exec_appropriation_details.program_code, 
        exec_appropriation_details.project, exec_appropriation_details.project_code, 
        exec_appropriation_details.activity, exec_appropriation_details.activity_code, exec_appropriation_details.AIPCode,
        exec_appropriation_details.activity_description, exec_appropriation_details.account_code, exec_appropriation_details.account_name,
        exec_appropriation_details.appro_amount, exec_appropriation_details.appro_total
        
        from exec_appropriations 
        join exec_appropriation_details
        join departments
    
        where exec_appropriations.appro_id = app_id
        and exec_appropriation_details.appro_id = app_id
        and exec_appropriation_details.AIPCode = aip_code
        and departments.department_code = exec_appropriations.department_code_id;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_appro_sp');
    }
};
