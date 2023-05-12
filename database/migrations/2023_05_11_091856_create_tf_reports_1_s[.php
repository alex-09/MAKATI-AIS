<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $procedure = " DROP PROCEDURE IF EXISTS `trust_fund_report_1`;
        CREATE PROCEDURE `trust_fund_report_1` ()
            BEGIN
        SELECT str.str_name AS str_name,
            SUM(tf_fund_details.amount_allocated) AS TrustReceipt,
            SUM(tf_fund_details.latest_balance) AS Obligations
        FROM
            tf_fund_details 
            JOIN src_trust_receipt AS str ON str.id = tf_fund_details.tr_type
        WHERE
            tf_fund_details.tr_type = 1
                AND tf_fund_details.status = 'Approved'
        UNION SELECT 
            str.str_name AS str_name,
            SUM(tf_fund_details.amount_allocated) AS trust_receipt,
            SUM(tf_fund_details.latest_balance) AS Obligations
        FROM
            tf_fund_details 
            JOIN src_trust_receipt str ON str.id = tf_fund_details.tr_type
        WHERE
            tf_fund_details.tr_type = 2 
        UNION SELECT 
            str.str_name AS str_name,
            SUM(tf_fund_details.amount_allocated) AS trust_receipt,
            SUM(tf_fund_details.latest_balance) AS bligations
        FROM
            tf_fund_details
            JOIN src_trust_receipt AS str ON str.id = tf_fund_details.tr_type
        WHERE
            tf_fund_details.tr_type = 3 
        UNION SELECT 
            str.str_name AS str_name,
            SUM(tf_fund_details.amount_allocated) AS trust_receipt,
            SUM(tf_fund_details.latest_balance) AS Obligations
        FROM
            tf_fund_details 
            JOIN src_trust_receipt AS str ON str.id = tf_fund_details.tr_type
        WHERE
            tf_fund_details.tr_type = 4 
        UNION SELECT 
            'Total:' AS Total,
            SUM(tf_fund_details.amount_allocated) AS trust_receipt,
            SUM(tf_fund_details.latest_balance) AS Obligations
        FROM
            tf_fund_details
        WHERE
            tf_fund_details.status = 'Approved';
    END;";

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
