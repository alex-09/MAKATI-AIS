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
        $procedure = " DROP VIEW IF EXISTS `list_all_coa`;
        CREATE VIEW `list_all_coa` AS

        SELECT account_code, 
        account_title 
        FROM coa_assets
        
        UNION 
        SELECT account_code, 
        account_title 
         FROM coa_liabilities
        
        UNION 
        SELECT account_code, 
        account_title 
        FROM coa_equity
        
        UNION
        SELECT account_code, 
        account_title 
        FROM coa_income
        
        UNION 
        SELECT account_code, 
        account_title  
        FROM coa_expenses
        ";
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_all_coa');
    }
};
