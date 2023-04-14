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
        $procedure = " DROP PROCEDURE IF EXISTS `filterAllot`;
            CREATE PROCEDURE `filterAllot`(IN budyear int(2), IN approtype int(2), IN sourcedocu varchar(25), IN office int(5),
            IN prog int(5), IN proj int(5), IN act int(5))

            BEGIN
                select allot.department_code_id, allot.approType_id, act.activity_id, act.activity, act.activity_code, exp.account_name, 
                exp.expenses_id, exp.account_code, exp.appro_amount, exp.allot_amount, exp.balance

            FROM allotments AS allot
                INNER JOIN activities AS act
                ON allot.activity_code_id = act.activity_code
                INNER JOIN expenses AS exp
                ON exp.activity_code_id = act.activity_code

            WHERE allot.budget_year_id = budyear
                AND allot.approType_id = approtype
                AND allot.document_source = sourcedocu
                AND allot.department_code_id = office
                AND allot.program_code_id = prog
                AND allot.project_code_id = proj
                AND allot.activity_code_id = act;
            END;";
            
            DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filter_allot_stoproc');
    }
};
