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
        
            SELECT toga.tf_id, document_source, general_description, official_receipt_no, official_receipt_date, 
                government_type, agency_name, nadai_no, official_receipt_amount, nadai_date,
                main_fund_title, sub_fund_title, amount_allocated, specific_purpose, implementing_office
            
            FROM transfer_other_government_agencies as toga
            JOIN tf_fund_details as tfd
            
            WHERE tfd.tf_id = tfund_id
            and toga.tf_id = tfund_id;
            
        ELSEIF tf_type = 'Donation from Private Sector' THEN
        
            SELECT don.tf_id, company_name, document_source, 
                general_description, official_receipt_no, official_receipt_date
                main_fund_title, sub_fund_title, amount_allocated, specific_purpose, implementing_office
            
            FROM donation_private_sector as don
            JOIN tf_fund_details as tfd
            
            WHERE tfd.tf_id = tfund_id
            and don.tf_id = tfund_id;
            
        ELSEIF tf_type = 'Unexpended Balance of LDRRMF' THEN
        
            SELECT unex.tf_id, document_source, general_description, legal_basis,
                    budget_year_id, journal_voucher_no, journal_voucher_date
                    main_fund_title, sub_fund_title, amount_allocated, specific_purpose, implementing_office
            
            FROM trustfunds_unexpended_balance as unex
            JOIN tf_fund_details as tfd
            
            WHERE tfd.tf_id = tfund_id
            and unex.tf_id = tfund_id;
            
        ELSEIF tf_type = 'LGU Counterpart Contribution for Specific Projects' THEN
        
            SELECT lgu.tf_id, general_description,  legal_basis
            main_fund_title, sub_fund_title, amount_allocated, specific_purpose, implementing_office
            
            FROM trustfunds_lgu_counterpart as lgu
            JOIN tf_fund_details as tfd
            
            WHERE tfd.tf_id = tfund_id
            and lgu.tf_id = tfund_id;
            
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
