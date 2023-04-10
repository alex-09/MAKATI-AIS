<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Activity;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id('expenses_id');
            $table->string('appro_id');
            $table->string('allot_id')->nullable();
            $table->integer('program_code_id');
            $table->integer('project_code_id');
            $table->integer('activity_code_id');
            $table->string('account_name');
            $table->integer('account_code');
            $table->float('appro_amount', 17, 6);
            $table->float('appro_add', 17, 6)->nullable();
            $table->float('appro_deduct', 17, 6)->nullable();
            $table->float('allot_amount', 17, 6)->nullable();
            $table->float('balance', 17, 6)->nullable();
            $table->float('allot_add', 17, 6)->nullable();
            $table->float('allot_deduct', 17, 6)->nullable();
            $table->float('allot_adjust_balance', 17, 6)->nullable();
            $table->float('unallot_balance', 17, 6)->nullable();
            $table->float('obli_ammount', 17, 6)->nullable();
            $table->timestamps();

            $table->foreign('appro_id')->references('appro_id')->on('appropriations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('program_code_id')->references('program_code')->on('programs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('project_code_id')->references('project_code')->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('activity_code_id')->references('activity_code')->on('activities')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
