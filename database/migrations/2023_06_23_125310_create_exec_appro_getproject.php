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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_appro_getproject`;
        CREATE PROCEDURE `exec_appro_getproject` (IN program VARCHAR(250), IN appro VARCHAR(250))
        BEGIN

        SELECT DISTINCT project, project_code, appro_id

        FROM exec_appropriation_details
        WHERE program_code = program
        AND appro_id = appro
        AND status = 'Approved';
        
        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exec_appro_getproject');
    }
};
