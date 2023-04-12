<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class COAIncome extends Model
{
    use HasFactory;

    protected $table = 'coa_income';

    protected $fillable = [

        'account_group',
        'major_account_group',
        'sub-major_account_group',
        'general_ledger_accounts',
        'sub_ledger_accounts',
        'sub-sub_ledger_accounts',
        'account_code',
        'account_title',
        'description',
        'status',
        'date'
        
    ];
}
