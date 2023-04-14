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
        $procedure = " DROP PROCEDURE IF EXISTS `searchApproForAllot`;
        CREATE PROCEDURE `searchApproForAllot`(IN budYear int(2), IN fundSrc int(2), 
        IN dept int(5), IN refDocu varchar(50), IN program int(5), 
        IN project int(5), IN activity int(5))
        BEGIN
                    SELECT ap.appro_id, ap.reference_document, ap.approType_id, 
                    prog.program_id, prog.program, prog.program_code, 
                    proj.project_id, proj.project, proj.project_code,
                    act.activity_id, act.activity, act.activity_code, act.activity_description, 
                    exp.expenses_id, exp.account_name, exp.account_code, exp.appro_amount

                    FROM appropriations AS ap
                    INNER JOIN programs AS prog
                    USING (appro_id)
                    INNER JOIN projects AS proj
                    ON prog.program_code = proj.program_code_id
                    INNER JOIN activities AS act 
                    ON proj.project_code = act.project_code_id
                    INNER JOIN expenses AS exp
                    ON act.activity_code = exp.activity_code_id

                    WHERE ap.budget_year_id = budYear 
                    AND ap.fundSource_id = fundSrc
                    AND ap.reference_document = refDocu

                    AND prog.appro_id = ap.appro_id
                    AND prog.program_code = program
                    AND proj.appro_id = ap.appro_id
                    AND proj.project_code = project
                    AND act.appro_id = ap.appro_id
                    AND act.activity_code = activity
                    AND exp.appro_id = ap.appro_id
                    AND exp.activity_code_id = activity;
        END;";
            
            DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_appro_for_allot_sp');
    }
};
