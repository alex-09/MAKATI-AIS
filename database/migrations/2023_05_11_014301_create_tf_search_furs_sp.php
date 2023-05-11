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
        $procedure = " DROP PROCEDURE IF EXISTS `tf_search_furs`;
        CREATE PROCEDURE `tf_search_furs` (IN furs VARCHAR(20))
        BEGIN

        SELECT main.tf_obli_id, main.implemeting_office, main.furs_amount, main.particulars, main.furs_number, main.transaction_type, main.purchase_req_date,
		main.purchase_req_no, main.payee, main.requesting_official, sub.src_of_tf, sub.company, sub.main_fund_title,
        sub.sub_fund_title, sub.latest_bal_tf, sub.account_title, sub.account_code, sub.amount_obligated, sub.amount_obligated, sub.remarks
        FROM tf_obigations as main
        JOIN tf_obligation_detatils as sub
        ON main.tf_obli_id = sub.tf_obli_id
        where main.furs_number = furs
        and main.status = 'Approved';
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tf_search_furs_sp');
    }
};
