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
        $procedure = " DROP PROCEDURE IF EXISTS `list_checktransac_outgoing`;
        CREATE PROCEDURE `list_checktransac_outgoing` ()
        BEGIN

        SELECT DATE_FORMAT(ct_receive_checks.created_at, '%M %d %Y ') AS date, 
		og_transmital_no,
        transaction_id_num,
		department_name,
        dv_no,
        dv_date,
        check_no,
        date_of_check,
        aa_no,
        aa_date,
		payee_name,
        particulars,
        amount,
		og_sender,
        og_received_by,
        og_date

        FROM ct_receive_checks
        join departments
        on ct_receive_checks.department_office = departments.department_code
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
        Schema::dropIfExists('list_checktransac_outgoing');
    }
};
