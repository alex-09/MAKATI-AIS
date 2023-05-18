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
        $procedure = " DROP PROCEDURE IF EXISTS `dm_print_do`;
        CREATE PROCEDURE `dm_print_do` (IN ids varchar(1000))
        BEGIN

        select id,  DATE_FORMAT(created_at, '%M %d %Y ') AS date, transaction_id_no, particulars, bearer_name

        from dm_od_newtransac
        where find_in_set(id, ids);
        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_print_do_ps');
    }
};
