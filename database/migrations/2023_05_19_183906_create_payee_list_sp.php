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
        $procedure = " DROP PROCEDURE IF EXISTS `get_payee_list`;
        CREATE PROCEDURE `get_payee_list` ()
        BEGIN

        select 	*
        from (
            SELECT id, DATE_FORMAT(created_at, '%M %d %Y ') AS date, CONCAT(last_name, ' ', first_name) AS complete_name,
                CONCAT(building_no, ' ', lot_no, ' ',street, ' ',barangay, ' ',municipality_city, ' ',province, ' ',country) AS complete_address,
                type_of_payee_id, tax, dti, null as sec, null as cda, authorized as authorized, contact, receiver, status, email
            FROM pe_individual
            
            union 
            select id, DATE_FORMAT(created_at, '%M %d %Y ') AS date, business_name as complete_name,
                        CONCAT(building_no, ' ', lot_no, ' ',street, ' ',barangay, ' ',municipality_city, ' ',province, ' ',country) AS complete_address,
                        business_type AS type_of_payee_id, tax_id_no as tax, dti_no, section_no as sec, cda_no, authorized_rep as authorized, contact_no, receiver, status, email
            from pe_business
            
            union 
            select id, DATE_FORMAT(created_at, '%M %d %Y ') AS date, agency_name as complete_name,
                        CONCAT(building_no, ' ', lot_no, ' ',street, ' ',barangay, ' ',municipality_city, ' ',province, ' ',country) AS complete_address,
                        type_of_payee_id, tax_id_no as tax, null as dti, null as sec, null as cds, authorized_rep as authorized, contact_no, receiver, status, email
            from pe_government_agency
        ) payee
        order by date;
        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payee_list_sp');
    }
};
