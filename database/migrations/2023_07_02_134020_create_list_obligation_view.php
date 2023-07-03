<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = " DROP VIEW IF EXISTS `list_obligation_view`;
        CREATE VIEW `list_obligation_view` AS

        SELECT DATE_FORMAT(exec_obligations.created_at,'%M %d %Y ') AS Date,
        DATE_FORMAT(exec_obligations.created_at,'%h:%i:%s') AS time,
        dm_bot.number,
        dm_bot.docu_type_id,
        NULL AS ref_no,
        departments.department_name,
        exec_obligations.particulars,
        exec_obligations.cafoa_amount,
        exec_obligations.date_process,
        exec_obligations.status
        
        FROM exec_obligations 
        LEFT JOIN dm_bot
        ON exec_obligations.obli_id = dm_bot.cafoa_id
        INNER JOIN departments
        ON exec_obligations.department = departments.department_code

        ORDER BY Date DESC, time DESC
        ";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_obligation_view');
    }
};
