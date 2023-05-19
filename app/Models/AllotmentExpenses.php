<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllotmentExpenses extends Model
{
    use HasFactory;

    protected $table = "exec_allotment_expenses";

    protected $fillable = [
        'appro_id',
        'allot_id',
        'AIPCode',
        'account_name',
        'account_code',
        'appro_amount',
        'allot_amount',
        'balance',
        'latest_balance',
    ];  
}
