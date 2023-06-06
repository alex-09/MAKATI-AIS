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
        $procedure = " DROP PROCEDURE IF EXISTS `list_payrollappoint_outgoing`;
        CREATE PROCEDURE `list_payrollappoint_outgoing` ()
        BEGIN

        SELECT DATE_FORMAT(dm_payment_appointment.created_at, '%M %d %Y ') AS date, 
		og_transmital_no,
        transaction_id_no,
		department_name,
		covered_from,
        covered_to,
		appointment_status,
        subject,
		og_sender,
        og_received_by,
        og_date

        FROM dm_payment_appointment
        join departments
        on dm_payment_appointment.department = departments.department_code
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
        Schema::dropIfExists('list_payappoint_outgoing');
    }
};
