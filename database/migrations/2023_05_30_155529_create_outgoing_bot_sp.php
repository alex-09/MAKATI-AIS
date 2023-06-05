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
        $procedure = " DROP PROCEDURE IF EXISTS `list_bot_outgoing`;
        CREATE PROCEDURE `list_bot_outgoing` ()
        BEGIN

        SELECT DATE_FORMAT(dm_bot.created_at, '%M %d %Y ') AS date,
            og_transmital_no,
            transaction_id,
            departments.department_name,
            cafoa_id,
            furs_id,
            description,
            amount,
            og_sender,
            og_received_by,
            og_date
        
        from dm_bot
        join departments
        on dm_bot.department_id = departments.department_code
		where status = 'For Outgoing'
        order by dm_od_newtransac.created_at DESC;

        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoing_bot_sp');
    }
};
