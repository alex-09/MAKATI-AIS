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
        $procedure = " DROP PROCEDURE IF EXISTS `slct_incomSelectDate`;
        CREATE PROCEDURE `slct_incomSelectDate` (IN slctdate VARCHAR(15))
        BEGIN
            select *
            from coa_income_previouses AS coa
            where coa.date_effectivity = slctdate
            order by  account_code ASC;
        END
        ";
        
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
