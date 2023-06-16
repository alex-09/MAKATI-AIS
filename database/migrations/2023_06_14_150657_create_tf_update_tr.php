<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = " DROP PROCEDURE IF EXISTS `tf_update_tr`;
        CREATE PROCEDURE `tf_update_tr` (IN type INT, IN main_title VARCHAR(50))
        BEGIN

		SELECT id, 
        tf_id,
        sub_fund_title,
        reference, 
        update_reasons,
        latest_balance,
        addition,
        deduction,
        updated_balance
	
        FROM tf_fund_details
        WHERE tr_type = type
        AND main_fund_title = main_title
        AND status = 'Approved';

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
        Schema::dropIfExists('tf_update_tr');
    }
};
