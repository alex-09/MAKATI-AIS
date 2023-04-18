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
        $procedure = " DROP PROCEDURE IF EXISTS `get_coaDate`;
        CREATE PROCEDURE `get_coaDate` (IN slctdate VARCHAR(15))
        BEGIN
        select * from coa_assets AS coa
        where coa.date_effectivity = slctdate;
        END
        ";
        
        DB::unprepared($procedure);
    }
};
