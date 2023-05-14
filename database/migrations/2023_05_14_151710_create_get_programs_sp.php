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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_programs`;
        CREATE PROCEDURE `exec_programs` ()
        BEGIN

        select exec_appropriation_details.program, exec_appropriation_details.program_code
        from exec_appropriation_details
        group by program;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_programs_sp');
    }
};
