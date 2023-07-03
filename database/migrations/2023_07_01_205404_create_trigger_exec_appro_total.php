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
        DB::unprepared(' 
        CREATE TRIGGER trigger_exec_appro_total
        BEFORE INSERT ON exec_appropriation_expenses
        FOR EACH ROW
        BEGIN
            DECLARE amount FLOAT DEFAULT 0;
            
            IF NEW.addition IS NOT NULL THEN 
                SET amount = NEW.appro_amount + NEW.addition;
            ELSE
                SET amount = NEW.appro_amount - NEW.deduction;
            END IF;    
            
            SET NEW.latest_appro_amount = amount;
            SET NEW.balance = amount;

        END'); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger_exec_appro_total');
    }
};
