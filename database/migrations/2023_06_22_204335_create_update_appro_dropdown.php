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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_appro_getdepartment`;
        CREATE PROCEDURE `exec_appro_getdepartment` (IN year VARCHAR(50), IN fundSource VARCHAR(50))
        BEGIN

        SELECT departments.department_name, 
                department_code, 
                exec_appropriations.appro_id

        FROM exec_appropriations
        JOIN departments
        ON exec_appropriations.department_code_id = department_code
        WHERE exec_appropriations.budget_year_id = year
        AND exec_appropriations.fundSource_id = fundSource
        AND exec_appropriations.status = 'Approved';

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
        Schema::dropIfExists('update_appro_dropdown');
    }
};
