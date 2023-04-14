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
        $view = "DROP VIEW IF EXISTS `bat_view`;
        CREATE VIEW `bat_view` AS
        SELECT 
            `bud`.`year` AS `Budget Year`,
            `ap`.`appro_id` AS `appro_id`,
            `ap`.`reference_document` AS `Reference Document`,
            `ap`.`fundSource_id` AS `Funding Source`,
            `ap`.`approType_id` AS `Type of Appropriation`,
            `ap`.`department_code_id` AS `office Code`,
            `ap`.`supp_budget_num` AS `supp_budget_num`,
            `ap`.`date_document` AS `date_document`,
            `ap`.`status` AS `Status`,
            `prog`.`program` AS `Program Name`,
            `prog`.`program_code` AS `Program Code`,
            `proj`.`project` AS `Project Name`,
            `proj`.`project_code` AS `Project Code`,
            `act`.`activity` AS `Activity Name`,
            `act`.`activity_code` AS `Activity Code`,
            `act`.`activity_description` AS `Activity Discription`,
            `act`.`appro_total` AS `total_exp_amount`,
            `act`.`appro_total_add` AS `Total Addition`,
            `act`.`appro_total_deduct` AS `Total Deduction`,
            `exp`.`account_name` AS `Account Name`,
            `exp`.`account_code` AS `Account Code`,
            `exp`.`appro_amount` AS `Amount`,
            `exp`.`appro_add` AS `Addition`,
            `exp`.`appro_deduct` AS `Deduction`
        FROM
            (((((`budget_years` `bud`
            JOIN `appropriations` `ap` ON (`bud`.`id` = `ap`.`budget_year_id`))
            JOIN `programs` `prog` ON (`ap`.`appro_id` = `prog`.`appro_id`))
            JOIN `projects` `proj` ON (`prog`.`program_code` = `proj`.`program_code_id`
                AND `prog`.`appro_id` = `proj`.`appro_id`))
            JOIN `activities` `act` ON (`proj`.`project_code` = `act`.`project_code_id`
                AND `proj`.`appro_id` = `act`.`appro_id`))
            JOIN `expenses` `exp` ON (`act`.`activity_code` = `exp`.`activity_code_id`
                AND `act`.`appro_id` = `exp`.`appro_id`))";

        DB::unprepared($view);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bat_view');
    }
};
