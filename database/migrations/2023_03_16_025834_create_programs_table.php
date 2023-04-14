<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Department;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id('program_id');
            $table->string('appro_id')->index();
            $table->integer('budget_year_id');
            $table->integer('department_code_id');
            $table->string('AIPCode');
            $table->integer('program_code')->index();
            $table->string('program');
            $table->timestamps();

            $table->foreign('appro_id')->references('appro_id')->on('appropriations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('department_code_id')->references('department_code')->on('departments')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
