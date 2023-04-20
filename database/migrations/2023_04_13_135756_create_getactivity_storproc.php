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
        $procedure = " DROP PROCEDURE IF EXISTS `getActivity`;
        CREATE PROCEDURE `getActivity`(IN projCode int(5))
        BEGIN
            select act.activity, act.activity_code
        
            from activities as act
                INNER JOIN projects as proj
                WHERE proj.project_code = act.project_code_id
                GROUP BY  activity;
        END";
        
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('getactivity_storproc');
    }
};
