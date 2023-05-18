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
        $procedure = " DROP PROCEDURE IF EXISTS `dm_print_pay_appoint`;
        CREATE PROCEDURE `dm_print_pay_appoint` (IN ids varchar(1000))
        BEGIN

        select id, DATE_FORMAT(dm_payment_appointment.created_at, '%M %d %Y ') AS date, transaction_id_no, transaction_type, cafoa_obr, caf, personnel_number, amount, payroll_type,
        employment_type, covered_from, covered_to, departments.department_name
        
        from dm_payment_appointment
        join departments
        on departments.department_code = dm_payment_appointment.bearer_dept
        where find_in_set(id, ids);
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_print_pay_appoint_ps');
    }
};
