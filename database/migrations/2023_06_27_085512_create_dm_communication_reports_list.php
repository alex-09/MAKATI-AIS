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
        $procedure = " DROP VIEW IF EXISTS `dm_communication_reports_list`;
        CREATE VIEW `dm_communication_reports_list` AS

        select id, 
        DATE_FORMAT(created_at, '%M %d %Y ') as date, 
        DATE_FORMAT(created_at, '%h:%i:%s') AS time, 
        transaction_id_num, 
        sender, 
        subject, 
        status, 
        document
        
        from receive_communications
        
        UNION 
        
		select 
        id, 
        DATE_FORMAT(created_at, '%M %d %Y ') as date, 
        DATE_FORMAT(created_at, '%h:%i:%s') AS time, 
        transac_id as transaction_id_num, 
        sender,
        subject,
        status, 
        document

        from create_communications
	
        where status = 'Closed'
        order by date DESC
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
        Schema::dropIfExists('dm_communication_reports_list');
    }
};
