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
        $procedure = " DROP PROCEDURE IF EXISTS `get_appro_division_head`;
        CREATE PROCEDURE `get_appro_division_head` ()
        BEGIN

        SELECT exec_appropriation_details.id, 
        exec_appropriation_details.appro_id, 
        DATE_FORMAT(exec_appropriation_details.created_at, '%M %d %Y ') as Date, 
        DATE_FORMAT(exec_appropriation_details.created_at, '%h:%i:%s') AS time,
        exec_appropriation_details.type, 
        exec_appropriations.budget_year_id,
        fund_sources.fund_Source,
        exec_appropriation_types.appro_type, 
        departments.department_name, 
        exec_appropriations.department_code_id,
        exec_appropriation_details.program, 
        exec_appropriation_details.project,
        exec_appropriation_details.activity, 
        exec_appropriation_details.AIPCode,
        exec_appropriation_details.appro_total, 
        exec_appropriation_details.status
    
        from exec_appropriations 
        
        join exec_appropriation_details
		on exec_appropriations.appro_id = exec_appropriation_details.appro_id
        
        join departments
		on exec_appropriations.department_code_id = departments.department_code
        
        INNER JOIN (SELECT appro_id, MAX(created_at) AS max_date FROM exec_appropriation_details GROUP BY appro_id) AS dets
        ON exec_appropriation_details.appro_id = dets.appro_id
        and exec_appropriation_details.created_at = dets.max_date
        
        JOIN fund_sources ON exec_appropriations.fundSource_id =fund_sources.fundSource_id
        JOIN exec_appropriation_types ON exec_appropriation_types.approType_id = exec_appropriation_types.approType_id

		WHERE exec_appropriation_details.status = 'For Approval - DH';
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_appro_division_head');
    }
};
