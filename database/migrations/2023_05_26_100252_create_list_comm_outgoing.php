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
        $procedure = " DROP PROCEDURE IF EXISTS `list_comm_outgoing`;
        CREATE PROCEDURE `list_comm_outgoing` ()
        BEGIN

        select *
        from(
            select DATE_FORMAT(created_at, '%M %d %Y ') as date, 
						transaction_id_num as id,
                        og_transmital_no, 
                        transaction_id_num, 
                        department,
                        particulars,
                        og_memo_no, 
                        receive_comm_type_id, 
                        null as receiver, 
                        subject, 
                        null as creator, 
                        og_sender, 
                        og_received_by, 
                        og_date,
                        status
                from receive_communications
                where status = 'For Outgoing'
                
                UNION 
                select DATE_FORMAT(created_at, '%M %d %Y ') as date, 
						transac_id as id,
                        og_transmital_no, 
                        null as transaction_id_num, 
                        department,
						particulars,
                        transac_id as og_memo_no, 
                        receive_comm_type_id, 
                        null as receiver, 
                        subject, 
                        creator, 
                        og_sender, 
                        og_received_by, 
                        og_date,
                        status
                from create_communications 
                where status = 'For Outgoing'
            )list
            order by date;
        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_comm_outgoing');
    }
};
