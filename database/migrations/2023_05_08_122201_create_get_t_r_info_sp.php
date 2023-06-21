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
        $procedure = " DROP PROCEDURE IF EXISTS `tf_gettr_infor`;
        CREATE PROCEDURE `tf_gettr_infor` (IN tf_type VARCHAR(50), IN tfund_id VARCHAR(50))
        BEGIN

            IF tf_type = 'Transfer from Other Government Agencies' THEN
        
            SELECT tf_id, document_source, general_description, official_receipt_no, official_receipt_date, 
                government_type, agency_name, nadai_no, official_receipt_amount, nadai_date	
            
            FROM transfer_other_government_agencies 
            
            WHERE tf_id = tfund_id
            and tf_id = tfund_id;
            
        ELSEIF tf_type = 'Donation from Private Sector' THEN
        
            SELECT tf_id, company_name, document_source, 
                general_description, official_receipt_no, official_receipt_date
            
            FROM donation_private_sector
            
            WHERE Tf_id = tfund_id
            and tf_id = tfund_id;
            
        ELSEIF tf_type = 'Unexpended Balance of LDRRMF' THEN
        
            SELECT tf_id, document_source, general_description, legal_basis,
                    budget_year_id, journal_voucher_no, journal_voucher_date
            
            FROM trustfunds_unexpended_balance
            
            WHERE tf_id = tfund_id
            and tf_id = tfund_id;
            
        ELSEIF tf_type = 'LGU Counterpart Contribution for Specific Projects' THEN
        
            SELECT tf_id, general_description,  legal_basis
            
            FROM trustfunds_lgu_counterpart 
            
            WHERE tf_id = tfund_id
            and tf_id = tfund_id;
            
        END IF;
        END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_t_r_info_sp');
    }
};
