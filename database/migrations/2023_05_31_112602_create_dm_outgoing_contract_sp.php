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
        $procedure = " DROP PROCEDURE IF EXISTS `list_contractpo_outgoing`;
        CREATE PROCEDURE `list_contractpo_outgoing` ()
        BEGIN

        SELECT DATE_FORMAT(dm_contractpos.created_at, '%M %d %Y ') AS date, 
		DATE_FORMAT(dm_contractpos.created_at, '%h:%i:%s') AS time,
        type,
		og_transmital_no,
		og_transmital_no,
        transaction_id,
		departments.department_name,
        contract_no,
        po_no,
        po_date,
        payee_name,
        description,
        amount,
		og_sender,
        og_received_by,
        og_date

        FROM dm_contractpos
        join departments
        on dm_contractpos.department_id = departments.department_code
		where status = 'For Outgoing'
        order by date DESC;

        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_outgoing_contract_sp');
    }
};
