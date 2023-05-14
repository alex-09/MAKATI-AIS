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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_projects`;
        CREATE PROCEDURE `exec_projects` ()
        BEGIN

        select exec_appropriation_details.project, exec_appropriation_details.project_code
        from exec_appropriation_details
        group by project;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_projects_sp');
    }
};
