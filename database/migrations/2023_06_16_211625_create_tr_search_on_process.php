<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = " DROP PROCEDURE IF EXISTS `tf_search_tr_on_process`;
        CREATE PROCEDURE `tf_search_tr_on_process` (IN type INT)
        BEGIN

        SELECT DATE_FORMAT(fund_dets.created_at, '%M %d %Y ') AS date, 
        DATE_FORMAT(fund_dets.created_at, '%h:%i:%s') AS time, 
        fund_dets.type, str.str_name, 
        fund_dets.main_fund_title, 
        fund_dets.sub_fund_title, 
        fund_dets.implementing_office, 
        fund_dets.amount_allocated, 
        fund_dets.processor, 
        fund_dets.reviewer, 
        fund_dets.status
        FROM tf_fund_details as fund_dets
        INNER JOIN src_trust_receipt as str
        ON fund_dets.tr_type = str.id
        
        where fund_dets.tr_type = type
        and status != 'Approved';

        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_search_on_process');
    }
};
