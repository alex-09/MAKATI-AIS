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
        $procedure = " DROP PROCEDURE IF EXISTS `dm_print_contractpo`;
        CREATE PROCEDURE `dm_print_contractpo` (IN ids varchar(1000))
        BEGIN

        select id, transaction_id, departments.department_name, payee_name, description, amount, current_bearer

        from dm_contractpos
        join departments 
        on departments.department_code = dm_contractpos.department_id
        where find_in_set(id, ids);
        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dm_print_contractpo_ps');
    }
};
