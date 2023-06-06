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
        $procedure = " DROP PROCEDURE IF EXISTS `get_equitySetYear`;
        CREATE PROCEDURE `get_equitySetYear` ()
        BEGIN

            SELECT date_effectivity FROM coa_equity
            WHERE date_effectivity IN (SELECT MAX(date_effectivity) 
            from coa_equity)
            group by date_effectivity
            ORDER BY date_effectivity DESC;

        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
