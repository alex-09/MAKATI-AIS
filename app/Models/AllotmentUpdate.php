<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllotmentUpdate extends Model
{
    use HasFactory;
    
    protected $table = "exec_allotment_updates";

    protected $fillable = [
        'appro_id',
        'allot_id',
        'AIPCode',
        'document_source',
        'date',
        'adjustment_type',
        'adjustment_no',
        'account_name',
        'account_code',
        'balance',
        'addition',
        'deduction',
        'adjusted_balance',
        'unalloted_balance'
    ];
}
