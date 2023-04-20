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
        $procedure = " DROP PROCEDURE IF EXISTS `listappropriation`;
        CREATE PROCEDURE `listappropriation`()
            BEGIN
            
                SELECT act.activity_id, prog.program, proj.project, act.activity, act.AIPCode, act.appro_total
                
                FROM activities as act
                    INNER JOIN programs as prog
                    ON prog.program_code = act.program_code_id AND prog.appro_id = act.appro_id
                    INNER JOIN projects as proj
                    ON proj.project_code = act.project_code_id AND proj.appro_id = act.appro_id
                    GROUP BY act.activity_id;
            
            END;";
            
            DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_appro_storeproc');
    }
};
