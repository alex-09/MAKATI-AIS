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
        $procedure = " DROP PROCEDURE IF EXISTS `tf_getapprove_processor`;
        CREATE PROCEDURE `tf_getapprove_processor` ()
        BEGIN

        SELECT DATE_FORMAT(fund_dets.created_at, '%M %d %Y ') AS date, DATE_FORMAT(fund_dets.created_at, '%h:%i:%s') AS time, fund_dets.type, str.str_name, 
        fund_dets.main_fund_title, fund_dets.sub_fund_title, 
        fund_dets.implementing_office, fund_dets.amount_allocated, 
        fund_dets.processor, fund_dets.reviewer, fund_dets.status
        FROM tf_fund_details as fund_dets
        INNER JOIN src_trust_receipt as str
        ON fund_dets.tr_type = str.id
        where status = 'Approved';
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tf_getapproved_processor_sp');
    }
};
