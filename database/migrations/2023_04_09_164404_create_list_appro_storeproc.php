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
            
                SELECT prog.program, proj.project, act.activity, act.total_exp_amount
            
                FROM programs AS prog
                INNER JOIN projects AS proj
                ON prog.program_code = proj.program_code_id
                INNER JOIN activities as act
                ON proj.project_code = act.project_code_id;
            
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
