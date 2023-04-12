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
        $procedure = " DROP PROCEDURE IF EXISTS `listAllot`;
        CREATE PROCEDURE `listAllot`()

        BEGIN
            SELECT allot.program_code_id, allot.project_code_id, allot.activity_code_id, act.allot_total, allot.status

        FROM allotments AS allot
            INNER JOIN activities AS act
            USING (allot_id);

        END";
        
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_allot_stopro');
    }
};
