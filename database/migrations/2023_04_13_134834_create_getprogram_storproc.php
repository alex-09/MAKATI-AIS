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
        $procedure = " DROP PROCEDURE IF EXISTS `getProgram`;
        CREATE PROCEDURE `getProgram`(IN deptCode int(5))
        
        BEGIN
            select prog.program, prog.program_code
        
            from departments as dept
            INNER JOIN programs as prog
            WHERE prog.department_code_id = department_code
            GROUP BY  program;

        END";
        
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('getprogram_storproc');
    }
};
