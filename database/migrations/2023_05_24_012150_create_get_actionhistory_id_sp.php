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
        $procedure = " DROP PROCEDURE IF EXISTS `get_actionhistory_id`;
        CREATE PROCEDURE `get_actionhistory_id` (IN id VARCHAR(250))
        BEGIN

        if left(id, 3) = 'COM' then

            SELECT receive_communications.sender, 
                    receive_communications.department, 
                    receive_communications.subject,
                    action_histories.type_id,
                    DATE_FORMAT(action_histories.created_at, '%M %d %Y ') AS date, 
                    DATE_FORMAT(action_histories.created_at, '%h:%i:%s') AS time, 
                    action_histories.particulars, 
                    action_histories.user
            
            from action_histories
            left join receive_communications on receive_communications.transaction_id_num = id
            where action_histories.type_id = id;
        
        else 
        
            SELECT create_communications.sender, 
                    null as department, 
                    create_communications.subject,
                    action_histories.type_id,
                    DATE_FORMAT(action_histories.created_at, '%M %d %Y ') AS date,
                    DATE_FORMAT(action_histories.created_at, '%h:%i:%s') AS time, 
                    action_histories.particulars, 
                    action_histories.user
        
            from action_histories
            left join create_communications on create_communications.transac_id = id
            where action_histories.type_id = id;
            
        end if;
        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_actionhistory_id_sp');
    }
};
