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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_appro_update_report_supple`;
        CREATE PROCEDURE `exec_appro_update_report_supple` (IN aipcode VARCHAR(50), IN appro VARCHAR(50))
        BEGIN

        SELECT id,
        adjustment_no,
        account_name,
        account_code,
        balance,
        status

            FROM exec_appropriation_expenses

            where appro_id = appro
            AND AIPCode = aipcode
            and adjustment_type = 1;

        END";
        DB::unprepared($procedure); 

        $procedure = " DROP PROCEDURE IF EXISTS `exec_appro_update_report_supple_total`;
        CREATE PROCEDURE `exec_appro_update_report_supple_total` (IN aipcode VARCHAR(250), IN appro VARCHAR(250))
        BEGIN

        SELECT SUM(latest_appro_amount) Original_Total
        FROM exec_appropriation_expenses
        WHERE appro_id = appro 
        AND AIPCode = aipcode
        AND adjustment_type = 1
        AND adjustemt_id IS NOT NULL
        GROUP BY adjustemt_id;

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
        Schema::dropIfExists('exec_appro_update_report_supple');
    }
};
