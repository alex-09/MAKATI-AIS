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
        $procedure = " DROP PROCEDURE IF EXISTS `tf_list_obli_approve`;
        CREATE PROCEDURE `tf_list_obli_approve` ()
        BEGIN

        SELECT DATE_FORMAT(created_at, '%M %d %Y ') AS date, DATE_FORMAT(created_at, '%h:%i:%s') AS time, type, number, department_id,
        description, amount, transaction_id, processer, reviewer, status
        FROM dm_bot
        WHERE status = 'Approved'
        and docu_type_id = 'FURS';
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tf_list_obli_approved_sp');
    }
};
