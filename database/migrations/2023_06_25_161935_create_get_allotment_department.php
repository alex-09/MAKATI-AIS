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
        $procedure = " DROP PROCEDURE IF EXISTS `get_allotment_department`;
        CREATE PROCEDURE `get_allotment_department` (IN year VARCHAR(50), IN appro_type VARCHAR(50))
        BEGIN

        SELECT departments.department_code, departments.department_name

        FROM exec_allotments
        LEFT JOIN exec_appropriations
        ON exec_appropriations.appro_id = exec_allotments.appro_id
        LEFT JOIN departments
        ON exec_appropriations.department_code_id = departments.department_code
        
        WHERE exec_appropriations.budget_year_id = year
        AND exec_appropriations.approType_id = appro_type
        
        GROUP BY departments.department_code, departments.department_name;

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
        Schema::dropIfExists('get_allotment_department');
    }
};
