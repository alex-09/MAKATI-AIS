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
        $procedure = "DROP PROCEDURE IF EXISTS `search_appro`;
            CREATE PROCEDURE `search_appro` (IN budYear int, IN dept VARCHAR, IN fundSource VARCHAR, IN sourceDocu VARCHAR)
            BEGIN
            SELECT * FROM appropriations WHERE budget_year_id = budYear 
                AND department = dept 
                AND fund_source = fundSource 
                AND reference_document = sourceDocu;
            END;";

            DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_appro_storproc');
    }
};
