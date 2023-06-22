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

        " DROP PROCEDURE IF EXISTS `exec_appro_getprogram`;
        CREATE PROCEDURE `exec_appro_getprogram` (IN dept VARCHAR(50), IN appro VARCHAR(50))
        BEGIN

        SELECT program, 
        program_code, 
        appro_id

        FROM exec_appropriation_details
        WHERE department_code_id = dept
        and appro_id = appro
        AND status = 'Approved'

        END";

        " DROP PROCEDURE IF EXISTS `exec_appro_getproject`;
        CREATE PROCEDURE `exec_appro_getproject` (IN program VARCHAR(50), IN appro VARCHAR(50))
        BEGIN

        SELECT project, project_code, appro_id

        FROM exec_appropriation_details
        WHERE program_code = program
        AND appro_id = appro
        AND status = 'Approved'

        END";

        " DROP PROCEDURE IF EXISTS `exec_appro_getactivity`;
        CREATE PROCEDURE `exec_appro_getactivity` (IN program VARCHAR(50), IN project VARCHAR(50), IN appro VARCHAR(50))
        BEGIN

        SELECT activity, activity_code, AIPCode, appro_id

        FROM exec_appropriation_details
        WHERE program_code = program
        WHERE project_code = project
        AND appro_id = appro
        AND status = 'Approved';

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
