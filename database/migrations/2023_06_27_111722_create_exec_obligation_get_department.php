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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_obligation_get_department`;
        CREATE PROCEDURE `exec_obligation_get_department` (IN year VARCHAR(50), IN fundSource VARCHAR(50))
        BEGIN
        
        SELECT DISTINCT departments.department_name, 
        departments.department_code
        
        FROM exec_allotments
        LEFT JOIN exec_appropriations
        ON exec_appropriations.appro_id = exec_allotments.appro_id
        LEFT JOIN departments
        ON exec_appropriations.department_code_id = departments.department_code
        
        WHERE exec_appropriations.budget_year_id = year
        AND exec_appropriations.fundSource_id = fundSource;


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
        Schema::dropIfExists('exec_obligation_get_department');
    }
};
