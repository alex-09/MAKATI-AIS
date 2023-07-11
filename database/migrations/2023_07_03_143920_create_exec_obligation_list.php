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
        $procedure = " DROP VIEW IF EXISTS `exec_obligation_list_transactions`;
        CREATE VIEW `exec_obligation_list_transactions` AS

        SELECT exec_obligations.created_at, 
        exec_obligations.obli_id, 
        transaction_id,
        date_format(exec_obligations.created_at, '%M %e, %Y') as date, 
                date_format(exec_obligations.created_at, '%l:%i %p') as time,
                null as type_of_document,
                processing_slip_number,
                departments.department_name,
                exec_obligations.particulars,
                cafoa_amount,
                transaction_type,
                exec_obligations.status
                processer,
                reviewer

                
        FROM exec_obligations
        LEFT JOIN dm_bot
        ON dm_bot.cafoa_id = exec_obligations.obli_id
        LEFT JOIN departments
        ON departments.department_code = exec_obligations.department

        ORDER BY exec_obligations.created_at DESC
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
        Schema::dropIfExists('exec_obligation_list');
    }
};
