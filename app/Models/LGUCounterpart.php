<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LGUCounterpart extends Model
{
    protected $table = 'trustfunds_lgu_counterpart';

    protected $fillable = [
        
        "main_fund_id",
        "sub_fund_id",
        'general_descript',
        'legal_basis',
        'journal_voucher_no',
        'journal_voucher_date',
        'main_fund_title',
        'sub_fund_title',
        'specific_purpose',
        'amount_allocated',
        'implementing_office',
        'remarks'

    ];
}
