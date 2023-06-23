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
        $procedure = " DROP VIEW IF EXISTS `exec_list_appropriation`;
        CREATE VIEW `exec_list_appropriation` AS

        SELECT exec_appropriation_details.id, 
        exec_appropriation_details.appro_id, 
        DATE_FORMAT(exec_appropriation_details.created_at, '%M %d %Y ') as Date, 
        DATE_FORMAT(exec_appropriation_details.created_at, '%h:%i:%s') AS time,
        exec_appropriation_details.type, 
        exec_appropriations.budget_year_id,
        exec_appropriations.fundSource_id,
        exec_appropriations.approType_id, 
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
        and exec_appropriation_details.created_at = dets.max_date";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_appro_sp');
    }
};
