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
        CREATE VIEW `trust_fund_report_1` AS
        SELECT 
            `str`.`str_name` AS `str_name`,
            SUM(`det`.`amount_allocated`) AS `Trust Receipt`,
            SUM(`det`.`latest_balance`) AS `Obligations`
        FROM
            (`tf_fund_details` `det`
            JOIN `src_trust_receipt` `str` ON (`str`.`id` = `det`.`tr_type`))
        WHERE
            `det`.`tr_type` = 1
                AND `det`.`status` = 'Approved' 
        UNION SELECT 
            `str`.`str_name` AS `str_name`,
            SUM(`det`.`amount_allocated`) AS `trust_receipt`,
            SUM(`det`.`latest_balance`) AS `Obligations`
        FROM
            (`tf_fund_details` `det`
            JOIN `src_trust_receipt` `str` ON (`str`.`id` = `det`.`tr_type`))
        WHERE
            `det`.`tr_type` = 2 
        UNION SELECT 
            `str`.`str_name` AS `str_name`,
            SUM(`det`.`amount_allocated`) AS `trust_receipt`,
            SUM(`det`.`latest_balance`) AS `Obligations`
        FROM
            (`tf_fund_details` `det`
            JOIN `src_trust_receipt` `str` ON (`str`.`id` = `det`.`tr_type`))
        WHERE
            `det`.`tr_type` = 3 
        UNION SELECT 
            `str`.`str_name` AS `str_name`,
            SUM(`det`.`amount_allocated`) AS `trust_receipt`,
            SUM(`det`.`latest_balance`) AS `Obligations`
        FROM
            (`tf_fund_details` `det`
            JOIN `src_trust_receipt` `str` ON (`str`.`id` = `det`.`tr_type`))
        WHERE
            `det`.`tr_type` = 4 
        UNION SELECT 
            'Total:' AS `Total:`,
            SUM(`tf_fund_details`.`amount_allocated`) AS `SUM(amount_allocated)`,
            SUM(`tf_fund_details`.`latest_balance`) AS `SUM(latest_balance)`
        FROM
            `tf_fund_details`
        WHERE
            `tf_fund_details`.`status` = 'Approved'";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
