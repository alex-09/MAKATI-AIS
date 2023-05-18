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
        $procedure = " DROP PROCEDURE IF EXISTS `dm_print_comm`;
        CREATE PROCEDURE `dm_print_comm` (IN ids varchar(1000))
        BEGIN

        select id, transaction_id_num, subject, sender, bearer_name

        from receive_communications
        where find_in_set(id, ids);
        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_print_comm_ps');
    }
};
