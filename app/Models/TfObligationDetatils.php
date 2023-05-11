<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TfObligationDetatils extends Model
{
    use HasFactory;

    protected $fillable = [
        'tf_obli_id',
        'type',
        'src_of_tf',
        'main_fund_title',
        'company',
        'sub_fund_title',
        'latest_bal_tf',
        'account_title',
        'account_code',
        'amount_obligated',
        'balance',
        'remarks',
        'status',
        'latest_balance',
        'addition',
        'deduction',
        'updated_balance',
        'tf_count_id'
    ];
}
