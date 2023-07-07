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
        $procedure = " DROP VIEW IF EXISTS `list_allotment`;
        CREATE VIEW `makati-ais`.`list_allotment` AS
        SELECT exec_allotments.appro_id, 
		exec_allotments.allot_id,
        DATE_FORMAT(exec_allotments.created_at, '%M %d %Y ') as Date, 
        DATE_FORMAT(exec_allotments.created_at, '%h:%i:%s') AS time,
		exec_allotments.type,
        exec_allotments.budget_year_id,
        fund_sources.fund_Source,
        exec_appropriation_types.appro_type,
        departments.department_name,
        exec_allotments.department_code_id,
        exec_appropriation_details.program,
		exec_appropriation_details.project,
		exec_appropriation_details.activity,
        exec_allotments.AIPCode,
        exec_allotments.allot_amount,
        exec_allotments.status

        FROM exec_allotments
        LEFT JOIN exec_appropriations
        ON exec_appropriations.appro_id = exec_allotments.appro_id
        LEFT JOIN departments
        ON exec_appropriations.department_code_id = departments.department_code
        LEFT JOIN exec_appropriation_types
        ON exec_appropriations.approType_id = exec_appropriation_types.approType_id
        LEFT JOIN exec_appropriation_details
        ON exec_appropriation_details.AIPcode = exec_allotments.AIPcode
        AND exec_appropriation_details.appro_id = exec_allotments.appro_id
        LEFT JOIN fund_sources 
        ON fund_sources.fundSource_id = exec_appropriations.fundSource_id";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_allotment_view');
    }
};
