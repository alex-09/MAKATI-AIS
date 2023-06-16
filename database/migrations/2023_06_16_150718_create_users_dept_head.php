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
        $procedure = " DROP PROCEDURE IF EXISTS `list_main_fund_approved`;
        CREATEVIEW `users_division_heads` AS
        SELECT 
            `users`.`id` AS `id`,
            `users`.`surname` AS `surname`,
            `users`.`firstname` AS `firstname`,
            `users`.`middlename` AS `middlename`,
            `users`.`userdesignation` AS `userdesignation`,
            `users`.`position` AS `position`,
            `users`.`division` AS `division`,
            `users`.`cluster` AS `cluster`,
            `users`.`gender` AS `gender`,
            `users`.`birthdate` AS `birthdate`,
            `users`.`no_bldg_street` AS `no_bldg_street`,
            `users`.`barangay` AS `barangay`,
            `users`.`city` AS `city`,
            `users`.`province` AS `province`,
            `users`.`email` AS `email`,
            `users`.`contactnumber` AS `contactnumber`,
            `users`.`alternative_contactnumber` AS `alternative_contactnumber`,
            `users`.`module` AS `module`,
            `users`.`isAdmin` AS `isAdmin`,
            `users`.`email_verified_at` AS `email_verified_at`,
            `users`.`password` AS `password`,
            `users`.`remember_token` AS `remember_token`,
            `users`.`created_at` AS `created_at`,
            `users`.`updated_at` AS `updated_at`
        FROM
            `users`
        WHERE
            `users`.`division` IN ('Administrative Division' , 'Processing of Claims and Internal Control Division',
                'Payroll Processing and Remittance Division',
                'Bookkeeping Division',
                'Financial Reporting Division',
                'Barangay Accounts Division')
                AND `users`.`position` IN ('Assistant Division Head' , 'Assistant Head')
        ORDER BY `users`.`division`";

        DB::unprepared($procedure); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_dept_head');
    }
};
