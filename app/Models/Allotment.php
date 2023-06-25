<?php

namespace App\Models;

use App\Http\Controllers\Allotment\EnrollAllotmentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allotment extends Model
{
    protected $table = 'exec_allotments';

    protected $fillable = [
        'appro_id',
        'allot_id',
        'type',
        'budget_year_id',
        'department_code_id',
        'AIPCode',
        'account_name',
        'account_code',
        'appro_amount',
        'allot_amount',
        'balance',
        'latest_balance',
        'document_source',
        'date',
        'adjustment_type',
        'adjustment_no',
        'addition',
        'deduction',
        'adjusted_balance',
        'unalloted_balance',
        'status'
    ];
}
