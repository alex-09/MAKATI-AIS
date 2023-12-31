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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_appro_getprogram`;
        CREATE PROCEDURE `exec_appro_getprogram` (IN dept VARCHAR(50), IN appro VARCHAR(250))
        BEGIN

        SELECT DISTINCT program, 
        program_code, 
        appro_id

        FROM exec_appropriation_details
        WHERE department_code_id = dept
        and appro_id = appro
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
        Schema::dropIfExists('exec_appro_getprogram');
    }
};
