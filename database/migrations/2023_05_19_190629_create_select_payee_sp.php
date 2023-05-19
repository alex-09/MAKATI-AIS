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
        $procedure = " DROP PROCEDURE IF EXISTS `select_payee`;
        CREATE PROCEDURE `select_payee` (IN ids int(20), IN type varchar(20))
        BEGIN

        if type = 'Individual' then 
            SELECT *
            FROM pe_individual
            where pe_individual.id = ids;
            
        elseif type = 'Business' then
            select *
            from pe_business
            where pe_business.id = ids;
            
        elseif type = 'Government' then
            select *
            from pe_government_agency
            where pe_government_agency.id = ids;
        end if;
        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('select_payee_sp');
    }
};
