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
        $procedure = " DROP PROCEDURE IF EXISTS `exec_appro_getinfo_forreview`;
        CREATE PROCEDURE `exec_appro_getinfo_forreview` (IN aipcode VARCHAR(250), IN appro VARCHAR(250))
        BEGIN

        SELECT appro_type.appro_type,
		main_info.department_code_id,
        appro_details.activity,
		expenses.id,
        expenses.adjustemt_id,
		expenses.appro_id,
        expenses.AIPCode,
        expenses.account_name,
        expenses.account_code,
        expenses.latest_appro_amount AS appro_amount,
        expenses.status

        FROM exec_appropriation_expenses as expenses
        
        RIGHT JOIN exec_appropriations as main_info
        ON expenses.appro_id = main_info.appro_id
        
        JOIN exec_appropriation_details AS appro_details
        ON appro_details.appro_id = expenses.appro_id
        
        JOIN exec_appropriation_types AS appro_type
        ON appro_type.approType_id = main_info.approType_id
        
		INNER JOIN (SELECT appro_id, 
				MAX(created_at) AS max_date 
                FROM exec_appropriation_expenses 
                
                WHERE status = 'For Review'
                GROUP BY appro_id) AS dets
                
        ON expenses.appro_id = dets.appro_id
        and expenses.created_at = dets.max_date
        
        WHERE appro_details.AIPCode = expenses.AIPCode
        AND expenses.AIPCode = aipcode
        AND expenses.appro_id = appro;
        
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
        Schema::dropIfExists('exec_appro_getinfo_forreview');
    }
};
