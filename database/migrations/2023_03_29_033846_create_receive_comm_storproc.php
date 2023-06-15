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
        $procedure = "DROP PROCEDURE IF EXISTS `receive_comm`;
        CREATE PROCEDURE `receive_comm` ()
        BEGIN
        SELECT id, DATE_FORMAT(created_at, '%M %d %Y ') as Date, DATE_FORMAT(created_at, '%h:%i:%s') AS time, 
        transaction_id_num, sender, subject, bearer_name, department
        
        FROM receive_communications
        ORDER BY Date DESC;
        END;";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receive_comm_storproc');
    }
};
