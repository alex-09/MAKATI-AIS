<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnexpendedBalance extends Model
{
    protected $table = 'trustfunds_unexpended_balance';

    protected $fillable = [

    'budget_year_id',
    'document_source',
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

