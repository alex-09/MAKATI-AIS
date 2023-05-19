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
        $procedure = " DROP PROCEDURE IF EXISTS `get_appro_fundsource_allot`;
        CREATE PROCEDURE `get_appro_fundsource_allot` (IN year VARCHAR(20))
        BEGIN

        select fundSource_id 

        from exec_appropriations
        join exec_appropriation_details
    
        where exec_appropriations.appro_id = exec_appropriation_details.appro_id
        and exec_appropriation_details.status = 'Approved' 
        and exec_appropriations.budget_year_id = year
        
        group by fundSource_id;
        END";

        DB::unprepared($procedure);

        $procedure = " DROP PROCEDURE IF EXISTS `get_appro_department_allot`;
        CREATE PROCEDURE `get_appro_department_allot` (IN year VARCHAR(20), IN fundsrc VARCHAR(20))
        BEGIN

        select departments.department_name, departments.department_code 

        from exec_appropriations
        join exec_appropriation_details
        join departments
        
        where exec_appropriations.appro_id = exec_appropriation_details.appro_id
        and exec_appropriation_details.status = 'Approved' 
        and exec_appropriations.department_code_id = departments.department_code
        and exec_appropriations.budget_year_id = year
        and exec_appropriations.fundSource_id = fundsrc
        
        group by departments.department_name, departments.department_code ;
        END";

        DB::unprepared($procedure);

        $procedure = " DROP PROCEDURE IF EXISTS `get_appro_approtype_allot`;
        CREATE PROCEDURE `get_appro_approtype_allot` (IN year VARCHAR(20), IN fundsrc VARCHAR(20),
        IN dept VARCHAR(20))
        BEGIN

        select exec_appropriations.approType_id 

        from exec_appropriations
        join exec_appropriation_details
        join departments
        
        where exec_appropriations.appro_id = exec_appropriation_details.appro_id
        and exec_appropriation_details.status = 'Approved' 
        and exec_appropriations.department_code_id = departments.department_code
        and exec_appropriations.budget_year_id = year
        and exec_appropriations.fundSource_id = fundsrc
        and exec_appropriations.department_code_id = dept
        
        group by exec_appropriations.approType_id ;
        END";

        DB::unprepared($procedure);

        $procedure = " DROP PROCEDURE IF EXISTS `get_appro_program_allot`;
        CREATE PROCEDURE `get_appro_program_allot` (IN year VARCHAR(20), IN fundsrc VARCHAR(20), IN dept VARCHAR(20),
        IN approtype VARCHAR(20))
        BEGIN

        select exec_appropriation_details.program, exec_appropriation_details.program_code

        from exec_appropriations
        join exec_appropriation_details
        join departments

        where exec_appropriations.appro_id = exec_appropriation_details.appro_id
        and exec_appropriation_details.status = 'Approved' 
        and exec_appropriations.budget_year_id = year
        and exec_appropriations.fundSource_id = fundsrc
        and exec_appropriations.department_code_id = dept
        and exec_appropriations.approType_id = approtype

        group by exec_appropriation_details.program, exec_appropriation_details.program_code;
        END";

        DB::unprepared($procedure);

        $procedure = " DROP PROCEDURE IF EXISTS `get_appro_project_allot`;
        CREATE PROCEDURE `get_appro_project_allot` (IN year VARCHAR(20), IN fundsrc VARCHAR(20), IN dept VARCHAR(20), 
        IN approtype VARCHAR(20), IN program VARCHAR(20))
        BEGIN

        select exec_appropriation_details.project, exec_appropriation_details.project_code

        from exec_appropriations
        join exec_appropriation_details
        join departments

        where exec_appropriations.appro_id = exec_appropriation_details.appro_id
        and exec_appropriation_details.status = 'Approved' 
        and exec_appropriations.budget_year_id = year
        and exec_appropriations.fundSource_id = fundsrc
        and exec_appropriations.department_code_id = dept
        and exec_appropriations.approType_id = approtype
        and exec_appropriation_details.program_code = program

        group by exec_appropriation_details.project, exec_appropriation_details.project_code;   
        END";

        DB::unprepared($procedure);

        $procedure = " DROP PROCEDURE IF EXISTS `get_appro_activity_allot`;
        CREATE PROCEDURE `get_appro_activity_allot` (IN year VARCHAR(20), IN fundsrc VARCHAR(20), IN dept VARCHAR(20), 
        IN approtype VARCHAR(20), IN program VARCHAR(20), IN project VARCHAR(20))
        BEGIN

        select exec_appropriation_details.activity, exec_appropriation_details.activity_code

        from exec_appropriations
        join exec_appropriation_details
        join departments

        where exec_appropriations.appro_id = exec_appropriation_details.appro_id
        and exec_appropriation_details.status = 'Approved' 
        and exec_appropriations.budget_year_id = year
        and exec_appropriations.fundSource_id = fundsrc
        and exec_appropriations.department_code_id = dept
        and exec_appropriations.approType_id = approtype
        and exec_appropriation_details.program_code = program
        and exec_appropriation_details.project_code = project;
        END";

        DB::unprepared($procedure);

        $procedure = " DROP PROCEDURE IF EXISTS `get_appro_expenses_allot`;
        CREATE PROCEDURE `get_appro_expenses_allot` (IN year VARCHAR(20), IN fundsrc VARCHAR(20), IN dept VARCHAR(20), 
        IN approtype VARCHAR(20), IN program VARCHAR(20), IN project VARCHAR(20), IN activity VARCHAR(20))
        BEGIN

        select exec_appropriation_details.appro_id, exec_appropriation_details.AIPCode, 
        exec_appropriation_expenses.account_name, exec_appropriation_expenses.account_code, 
        exec_appropriation_expenses.appro_amount

        from exec_appropriations
        join exec_appropriation_details
        join exec_appropriation_expenses
        join departments

        where exec_appropriations.appro_id = exec_appropriation_details.appro_id
        and exec_appropriation_details.appro_id = exec_appropriation_expenses.appro_id
        and exec_appropriation_details.AIPCode = exec_appropriation_expenses.AIPCode
        and exec_appropriation_details.status = 'Approved' 
        and exec_appropriations.budget_year_id = year
        and exec_appropriations.fundSource_id = fundsrc
        and exec_appropriations.department_code_id = dept
        and exec_appropriations.approType_id = approtype
        and exec_appropriation_details.program_code = program
        and exec_appropriation_details.project_code = project
        and exec_appropriation_details.activity_code = activity;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('for_allotment_dynamic_dropdown');
    }
};
