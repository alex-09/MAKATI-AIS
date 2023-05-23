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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_activity`;
        CREATE PROCEDURE `exec_activity` ()
        BEGIN

        select exec_appropriation_details.activity, exec_appropriation_details.activity_code
        from exec_appropriation_details
        group by activity, activity_code;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_activities_sp');
    }
};
