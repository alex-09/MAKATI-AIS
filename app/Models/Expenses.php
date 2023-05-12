<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $table = "exec_expenses";

    protected $fillable = [

        'appro_id',
        'budget_year_id',
        'department_code_id',
        'AIPCode',
        'program_code_id',
        'project_code_id',
        'activity_code_id',
        'account_name',
        'account_code',
        'appro_amount',
        'appro_add',
        'appro_deduct',
        'allot_id',
        'allot_amount',
        'balance',
        'allot_add',
        'allot_deduct',
        'allot_adjust_balance',
        'unallot_balance',
        'obli_ammount',
        'obli_add',
        'obli_deduct',
        'obli_adjust_balance',
    ];

    public function activities(){
        return $this->belongsTo(Activity::class, 'activity_code_id', 'activity_code');
    }
}
