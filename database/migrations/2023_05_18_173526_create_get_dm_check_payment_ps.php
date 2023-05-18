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
        $procedure = " DROP PROCEDURE IF EXISTS `get_dm_check_payment`;
        CREATE PROCEDURE `get_dm_check_payment` ()
        BEGIN

        select DATE_FORMAT(ct_receive_checks.created_at, '%M %d %Y ') AS date, id, transaction_id_num, departments.department_name, 
        dv_no, check_no, amount, date_of_check, payee_name, particulars, amount
        
        from ct_receive_checks
        join departments
        on departments.department_code = ct_receive_checks.department_office;
        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_dm_check_payment_ps');
    }
};
