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
        $procedure = " DROP PROCEDURE IF EXISTS `get_liabilityCurrYear`;
        CREATE PROCEDURE `get_liabilityCurrYear`()
        BEGIN
            select *
            from coa_liabilities
            where date_effectivity = ( select max(date_effectivity) from coa_liabilities );
        END
        ";
        
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_liabilityCurrYear');
    }
};
