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
        $procedure = " DROP PROCEDURE IF EXISTS `get_dm_check_payments`;
        CREATE PROCEDURE `get_dm_check_payments` ()
        BEGIN

        SELECT ct_receive_checks.id, DATE_FORMAT(ct_receive_checks.created_at, '%M %d %Y ') AS date, dv_no, DATE_FORMAT(ct_receive_checks.created_at, '%M %d %Y ') AS dv_date,
        check_no, date_of_check, payee_name, particulars, amount
        
        from ct_receive_checks
        join departments
        where departments.department_code = ct_receive_checks.department_office;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_payments_sp');
    }
};
