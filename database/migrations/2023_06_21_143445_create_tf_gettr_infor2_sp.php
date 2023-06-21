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
        $procedure = " DROP PROCEDURE IF EXISTS `tf_gettr_infor2`;
        CREATE PROCEDURE `tf_gettr_infor2` (IN tfund_id VARCHAR(50))
        BEGIN

        SELECT 
            tf_id,
            main_fund_title, 
            sub_fund_title, 
            amount_allocated, 
            specific_purpose, 
            implementing_office 
    
        FROM tf_fund_details
        where tf_id = tfund_id;

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
        Schema::dropIfExists('tf_gettr_infor2_sp');
    }
};
