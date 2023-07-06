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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_appro_update_original`;
        CREATE PROCEDURE `exec_appro_update_original` (IN aipcode VARCHAR(50), IN appro VARCHAR(50))
        BEGIN

        SELECT account_name, 
        account_code, 
        appro_amount, 
        status
        
        FROM exec_appropriation_expenses
        WHERE appro_id = appro
        AND AIPCode = aipcode
        AND adjustemt_id IS NULL;

        END";
        DB::unprepared($procedure); 

        $procedure = " DROP PROCEDURE IF EXISTS `exec_appro_update_original_total`;
        CREATE PROCEDURE `exec_appro_update_original_total` (IN aipcode VARCHAR(50), IN appro VARCHAR(50))
        BEGIN

        SELECT SUM(appro_amount) Original_Total

        FROM exec_appropriation_expenses
        WHERE appro_id = appro
        AND AIPCode = aipcode
        AND adjustemt_id IS NULL;

        END";
        DB::unprepared($procedure); 

        $procedure = " DROP PROCEDURE IF EXISTS `exec_appro_update_account_total`;
        CREATE PROCEDURE `exec_appro_update_account_total` (IN aipcode VARCHAR(250), IN appro VARCHAR(250))
        BEGIN

        SELECT account_code, SUM(latest_appro_amount) total
        FROM exec_appropriation_expenses
        WHERE AIPCode = aipcode
        AND appro_id = appro
        GROUP BY account_code;

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
        Schema::dropIfExists('exec_appro_update_original');
    }
};
