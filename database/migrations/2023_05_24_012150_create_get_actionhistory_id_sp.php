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

        SELECT type_id, DATE_FORMAT(created_at, '%M %d %Y ') AS date, DATE_FORMAT(created_at, '%h:%i:%s') AS time, particulars, user

        from
        action_histories
        
        where type_id = id;
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
