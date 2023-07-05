<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecObligationDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'obli_id',
        'allot_id',
        'AIPCode',
        'account_title',
        'cafoa_no',
        'account_code',
        'appro_amount',
        'allot_amount',
        'obli_amount',
        'balance',
        'latest_balance',
        'addition',
        'deduction',
        'updated_balance',
        'status'
    ];
}
