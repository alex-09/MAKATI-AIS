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
        $procedure = " DROP VIEW IF EXISTS `exec_obligation_list`;
        CREATE VIEW `exec_obligation_list` AS

        SELECT  id,    
        transaction_id,
		date_format(created_at, '%M %e, %Y') as date, 
		date_format(created_at, '%l:%i %p') as date, 
        number,
		docu_type_id,
		processing_slip_number,
		department_id,
		description,
		amount,
        status,
        null as transaction_type
        
        FROM dm_bot
        ORDER BY created_at DESC
        ";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exec_obligation_list');
    }
};
