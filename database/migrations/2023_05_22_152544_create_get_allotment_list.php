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
        $procedure = " DROP PROCEDURE IF EXISTS `get_allotment_list`;
        CREATE PROCEDURE `get_allotment_list` (IN ids int(20), IN type varchar(20))
        BEGIN

        SELECT exec_allotment_details.id, 
		exec_allotment_details.appro_id, 
        exec_allotment_details.allot_id, 
        DATE_FORMAT(exec_allotment_details.created_at, '%M %d %Y ') AS date, 
        DATE_FORMAT(exec_allotment_details.created_at, '%h:%i:%s') AS time,
		exec_allotment_details.type, 
        exec_allotment_details.budget_year_id, 
        exec_appropriations.fundSource_id, 
        exec_appropriations.approType_id,
		departments.department_name, 
		exec_appropriations.department_code_id, 
        exec_allotment_details.program, 
        exec_allotment_details.project,
		exec_allotment_details.activity, 
        exec_allotment_details.AIPCode, 
        exec_allotment_details.allot_total, 
        exec_allotment_details.status
	

        FROM exec_allotment_details

        LEFT JOIN exec_appropriations
        using (appro_id)

        JOIN departments
        on departments.department_code = exec_appropriations.department_code_id
        
        group by exec_allotment_details.id, 
		exec_allotment_details.appro_id, 
        exec_allotment_details.allot_id, 
        DATE_FORMAT(exec_allotment_details.created_at, '%M %d %Y '), 
        DATE_FORMAT(exec_allotment_details.created_at, '%h:%i:%s'),
		exec_allotment_details.type, 
        exec_allotment_details.budget_year_id, 
        exec_appropriations.fundSource_id, 
        exec_appropriations.approType_id,
		departments.department_name, 
		exec_appropriations.department_code_id, 
        exec_allotment_details.program, 
        exec_allotment_details.project,
		exec_allotment_details.activity, 
        exec_allotment_details.AIPCode, 
        exec_allotment_details.allot_total, 
        exec_allotment_details.status;
        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_allotment_list');
    }
};
