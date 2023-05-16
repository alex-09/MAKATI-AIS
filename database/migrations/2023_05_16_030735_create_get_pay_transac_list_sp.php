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
        $procedure = " DROP PROCEDURE IF EXISTS `get_pay_transac`;
        CREATE PROCEDURE `get_pay_transac` ()
        BEGIN

        SELECT id, DATE_FORMAT(created_at, '%M %d %Y ') AS date, DATE_FORMAT(created_at, '%h:%i:%s') AS time, transac_id, payee_name,
		particulars, amount, current_bearer
        FROM `makati-ais`.dm_payment_transactions;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_pay_transac_list_sp');
    }
};
