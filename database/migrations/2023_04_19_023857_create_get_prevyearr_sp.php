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
        $procedure = " DROP PROCEDURE IF EXISTS `get_prevYear`;
        CREATE PROCEDURE `get_prevYear`()
        BEGIN
            SELECT date_effectivity, coa_title 
            FROM coa_assets
            group by date_effectivity DESC LIMIT 1, 10;
        END
        ";
        
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_prevyearr_sp');
    }
};
