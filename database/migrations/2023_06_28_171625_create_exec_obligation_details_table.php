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
        Schema::create('exec_obligation_details', function (Blueprint $table) {
            $table->id();
            $table->string('obli_id')->nullable();
            $table->string('allot_id');
            $table->string('AIPCode');
            $table->string('account_title');
            $table->string('account_code');
            $table->string('appro_amount');
            $table->string('allot_amount');
            $table->string('obli_amount');
            $table->string('balance');
            $table->string('latest_balance');
            $table->string('addition')->nullable();
            $table->string('deduction')->nullable();
            $table->string('updated_balance')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exec_obligation_details');
    }
};
