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
        $procedure = " DROP PROCEDURE IF EXISTS `tf_getforreview_processor`;
        CREATE PROCEDURE `tf_getforreview_processor` ()
        BEGIN

        SELECT fund_dets.id, fund_dets.tf_id, DATE_FORMAT(fund_dets.created_at, '%M %d %Y ') AS date, DATE_FORMAT(fund_dets.created_at, '%h:%i:%s') AS time, fund_dets.type, str.str_name, 
        fund_dets.main_fund_title, fund_dets.sub_fund_title, 
        departments.department_name, fund_dets.amount_allocated, 
        fund_dets.processor, fund_dets.reviewer, fund_dets.status
        FROM tf_fund_details as fund_dets
        INNER JOIN src_trust_receipt as str
        ON fund_dets.tr_type = str.id
        join departments 
        on fund_dets.implementing_office = departments.department_code
        where status != 'Approved';
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tf_getforreview_processor_sp');
    }
};
