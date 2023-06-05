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
        $procedure = " DROP PROCEDURE IF EXISTS `list_rcd_outgoing`;
        CREATE PROCEDURE `list_rcd_outgoing` ()
        BEGIN

        SELECT DATE_FORMAT(dm_collection_deposit.created_at, '%M %d %Y ') AS date, 
		og_transmital_no,
        incom_transaction_id_no,
		department_name,
        subject,
		rcd_date,
		report_no,
        source_document,
        amount_collection,
        remarks,
		og_sender,
        og_received_by,
        og_date

        FROM dm_collection_deposit
        join departments
        on dm_collection_deposit.department = departments.department_code
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
        Schema::dropIfExists('dm_collection_deposit_counters');
    }
};
