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
        $procedure = " DROP PROCEDURE IF EXISTS `get_frs`;
        CREATE PROCEDURE `get_frs` ()
        BEGIN

        select id, DATE_FORMAT(created_at, '%M %d %Y ') as date, DATE_FORMAT(created_at, '%h:%i:%s') AS time, transaction_id_num, sender, receive_comm_type_id, subject, drn, reply_to,
        receive_comm_assignto_id as assign_to, cluster, restriction, action, no_of_days, status
        from receive_communications
        where cluster = 'FRS'
        
        UNION 
		select id, DATE_FORMAT(created_at, '%M %d %Y ') as date, DATE_FORMAT(created_at, '%h:%i:%s') AS time, transac_id as transaction_id_num, sender, receive_comm_type_id, subject, null as drn, reply_to,
        receive_comm_assignto_id as assign_to, cluster, restriction, action, no_of_days, status
        from create_communications

        where cluster = 'FRS'
        order by time DESC;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_frs');
    }
};
