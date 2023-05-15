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
        $procedure = " DROP PROCEDURE IF EXISTS `get_frs_bam`;
        CREATE PROCEDURE `get_frs_bam` ()
        BEGIN

        select id, DATE_FORMAT(created_at, '%M %d %Y ') as data, transaction_id_num, sender, type, subject, drn, reply_to,
        receive_comm_assignto_id as assign_to, cluster, restriction, action, no_of_days, status
    
        from receive_communications
        where receive_comm_assignto_id = 'Brgy Account Management';
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_frs_bam');
    }
};
