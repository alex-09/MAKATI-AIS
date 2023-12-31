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
        $procedure = "DROP PROCEDURE IF EXISTS `coa_income`;
            CREATE PROCEDURE `coa_income` ()
            BEGIN
            SELECT * FROM coa_income
            WHERE status != 'pending'
            order by  account_code ASC;
            END;";

            DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coa_income_procedure');
    }
};
