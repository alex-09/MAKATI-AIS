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
        $procedure = " DROP PROCEDURE IF EXISTS `list_main_fund_approved`;
        CREATE VIEW `makati-ais`.`list_main_fund_approved` AS
        SELECT 
            `makati-ais`.`tf_fund_details`.`tf_id` AS `tf_id`,
            `makati-ais`.`tf_fund_details`.`tr_type` AS `tr_type`,
            `makati-ais`.`tf_fund_details`.`main_fund_title` AS `main_fund_title`
        FROM
            `makati-ais`.`tf_fund_details`
        WHERE
            `makati-ais`.`tf_fund_details`.`status` = 'Approved'";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_main_fund');
    }
};
