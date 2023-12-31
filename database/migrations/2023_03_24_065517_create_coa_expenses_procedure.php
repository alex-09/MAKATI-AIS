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
        $procedure = "DROP PROCEDURE IF EXISTS `coa_expenses`;
            CREATE PROCEDURE `coa_expenses` ()
            BEGIN
            SELECT * FROM coa_expenses
            WHERE status != 'pending'
            order by  account_code ASC;
            END;";

            DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coa_expenses_procedure');
    }
};
