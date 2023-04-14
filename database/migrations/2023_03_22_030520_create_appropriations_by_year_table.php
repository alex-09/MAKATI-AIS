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
        $procedure = "DROP PROCEDURE IF EXISTS `appropriations_by_year`;
            CREATE PROCEDURE `appropriations_by_year` (IN byi int, IN dci int)
            BEGIN
            SELECT * FROM appropriations WHERE budget_year_id = byi 
            AND department_code_id = dci;
            END;";

            DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appropriations_by_year');
    }
};
