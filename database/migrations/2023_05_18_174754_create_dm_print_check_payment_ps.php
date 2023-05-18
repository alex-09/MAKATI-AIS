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
        $procedure = " DROP PROCEDURE IF EXISTS `dm_print_check_payment`;
        CREATE PROCEDURE `dm_print_check_payment` (IN ids VARCHAR(1000))
        BEGIN

        select DATE_FORMAT(ct_receive_checks.created_at, '%M %d %Y ') AS date, id, transaction_id_num, departments.department_name, 
        dv_no, check_no, amount, date_of_check, payee_name, particulars, amount
        
        from ct_receive_checks
        join departments
        on departments.department_code = ct_receive_checks.department_office
        where find_in_set(ct_receive_checks.id, ids);
        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_print_check_payment_ps');
    }
};
