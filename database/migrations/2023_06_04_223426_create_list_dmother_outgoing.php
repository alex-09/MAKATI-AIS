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
        $procedure = " DROP PROCEDURE IF EXISTS `list_other_outgoing`;
        CREATE PROCEDURE `list_other_outgoing` ()
        BEGIN

        SELECT DATE_FORMAT(dm_od_newtransac.created_at, '%M %d %Y ') AS date, 
		og_transmital_no,
        transaction_id_no,
		department_name,
        document_type,
        particulars,
		og_sender,
        og_received_by,
        og_date

        FROM dm_od_newtransac
        join departments
        on dm_od_newtransac.department = departments.department_code;

        END";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_dmother_outgoing');
    }
};
