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
        $procedure = " DROP PROCEDURE IF EXISTS `get_dm_bot_for_print`;
        CREATE PROCEDURE `get_dm_bot_for_print` ()
        BEGIN

        select  DATE_FORMAT(dm_bot.created_at, '%M %d %Y ') AS date, DATE_FORMAT(dm_bot.created_at, '%h:%i:%s') AS time, id, transaction_id, processing_slip_number, 
        departments.department_name, description, amount, current_bearer
        
        from dm_bot
        join departments
        on departments.department_code = dm_bot.department_id;
        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_bot_for_print_ps');
    }
};
