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
        $procedure = " DROP PROCEDURE IF EXISTS `get_dm_bot`;
        CREATE PROCEDURE `get_dm_bot` ()
        BEGIN

        SELECT dm_bot.id, dm_bot.transaction_id, DATE_FORMAT(dm_bot.created_at, '%M %d %Y ') as created_at, departments.department_name, 
        dm_bot.amount, dm_bot.processing_slip_number, dm_bot.current_bearer
        FROM dm_bot
        join departments
        where dm_bot.department_id = departments.department_code;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_dm_bot');
    }
};
