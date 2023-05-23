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
        $procedure = "DROP PROCEDURE IF EXISTS `pe_get_payee_name`;
        CREATE PROCEDURE `pe_get_payee_name` ()
        BEGIN

        select payee_name
        from (
                select business_name as payee_name 
                from pe_business 
            
                union 
                select agency_name as payee_name 
                from pe_government_agency 
            
                union 
                select CONCAT(first_name, ' ',last_name) as payee_name
                from pe_individual
                ) payee 
                order by payee_name;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_payee_name_sp');
    }
};
