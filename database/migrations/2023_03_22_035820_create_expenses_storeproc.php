<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $procedure = "DROP PROCEDURE IF EXISTS `expenses`;
            CREATE PROCEDURE `expenses` (IN byi int, IN dci int, IN progci int, IN projci int, IN acti int)
            BEGIN
            SELECT * FROM expenses WHERE budget_year_id = byi 
                AND department_code_id = dci 
                AND program_code_id = progci 
                AND project_code_id = projci
                AND activity_code = acti;
                END;";

            DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses_storeproc');
    }
};
