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
        $procedure = " DROP PROCEDURE IF EXISTS `list_preaud_outgoing`;
        CREATE PROCEDURE `list_preaud_outgoing` ()
        BEGIN

        SELECT DATE_FORMAT(dm_pre_audits.created_at, '%M %d %Y ') AS date, 
		dm_pre_audits.og_transmital_no,
        dm_pre_audits.transaction_id,
		departments.department_name,
		dm_pre_audits.payee_name,
        particulars,
        dm_pre_audits.amount,
		dm_pre_audits.og_sender,
        dm_pre_audits.og_received_by,
        dm_pre_audits.og_date

        FROM dm_pre_audits
        join dm_contractpos
        on dm_contractpos.transaction_id = dm_pre_audits.transaction_id
        join departments
        on dm_contractpos.department_id = departments.department_code;

        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_preaud_outgoing_sp');
    }
};
