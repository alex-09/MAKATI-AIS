<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnexpendedBalance extends Model
{
    protected $table = 'trustfunds_unexpended_balance';

    protected $fillable = [

    'tf_tub_id',
    'budget_year_id',
    'document_source',
    'general_description',
    'legal_basis',
    'journal_voucher_no',
    'journal_voucher_date',
    'remarks',
    'tr_type'
    
    ];
}

