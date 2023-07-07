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
        $procedure = " DROP VIEW IF EXISTS `list_processor_bot`;
        CREATE VIEW `list_processor_bot` AS

        SELECT concat(firstname, ' ', surname ) AS Name
        FROM users
        where division = 'Financial Reporting Division'
        and userdesignation = 'Processor'
        ";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_processor_bot');
    }
};
