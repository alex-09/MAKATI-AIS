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
        $procedure = " DROP PROCEDURE IF EXISTS `get_dm_preaudit`;
        CREATE PROCEDURE `get_dm_preaudit` ()
        BEGIN

        select id, DATE_FORMAT(created_at, '%M %d %Y ') AS date, DATE_FORMAT(created_at, '%h:%i:%s') AS time, 
        transaction_id, payee_name, particulars, amount
        
        from dm_pre_audits;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_preaudit_sp');
    }
};
