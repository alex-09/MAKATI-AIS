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
        $procedure = " DROP PROCEDURE IF EXISTS `get_dm_do_transacs`;
        CREATE PROCEDURE `get_dm_do_transacs` ()
        BEGIN

        select dm_od_newtransac.id, transaction_id_no, particulars, date, fund_source, bearer_name, 
        departments.department_name, contact_no, email

        from dm_od_newtransac
        join departments
        on departments.department_code = dm_od_newtransac.department_office;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('do_transaction_sp');
    }
};
