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
        $procedure = " DROP PROCEDURE IF EXISTS `dm_print_bot`;
        CREATE PROCEDURE `dm_print_bot` (IN ids VARCHAR(1000))
        BEGIN

        select id, transaction_id, processing_slip_number, departments.department_name, description, amount, current_bearer

        from dm_bot
        join departments
        on departments.department_code = dm_bot.department_id
        where find_in_set(dm_bot.id, ids);
        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_print_bot_ps');
    }
};
