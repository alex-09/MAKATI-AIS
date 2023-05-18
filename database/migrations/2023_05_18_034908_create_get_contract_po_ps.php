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
        $procedure = " DROP PROCEDURE IF EXISTS `get_dm_contractpo`;
        CREATE PROCEDURE `get_dm_contractpo` ()
        BEGIN

        select dm_contractpos.id, DATE_FORMAT(dm_contractpos.created_at, '%M %d %Y ') AS date, DATE_FORMAT(dm_contractpos.created_at, '%h:%i:%s') AS time, 
        transaction_id, contract_dept.department_name, payee_name, description, amount, current_bearer, current_bearer_dept.department_name AS current_bearer_dept_name,

		current_bearer_contact_number, current_bearer_contact_number
            
        from dm_contractpos
        join 
		departments AS contract_dept ON contract_dept.department_code = dm_contractpos.department_id
		JOIN
		departments AS current_bearer_dept ON current_bearer_dept.department_code = dm_contractpos.current_bearer_dept;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_contract_po_ps');
    }
};
