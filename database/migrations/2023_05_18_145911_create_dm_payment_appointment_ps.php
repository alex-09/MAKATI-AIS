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
        $procedure = " DROP PROCEDURE IF EXISTS `get_dm_payroll_appointment`;
        CREATE PROCEDURE `get_dm_payroll_appointment` ()
        BEGIN

        select id, transaction_id_no, transaction_type, cafoa_obr, caf, personnel_number, department, payroll_type,
        employment_type, covered_from, covered_to, subject, amount, bearer_name, bearer_address, bearer_contact, departments.department_name
        
        from dm_payment_appointment
        join departments
        on departments.department_code = dm_payment_appointment.bearer_dept;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_payment_appointment_ps');
    }
};
