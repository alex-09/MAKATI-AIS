<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class COAEquityTemp extends Model
{
    use HasFactory;

    protected $table = 'coa_equity_temps';

    protected $fillable = [

        'account_group',
        'major_account_group',
        'sub_major_account_group',
        'general_ledger_accounts',
        'sub_ledger_accounts',
        'sub_sub_ledger_accounts',
        'account_code',
        'account_title',
        'description',
        'status',
        'date_effect_index',
        'date_effectivity',
        'coa_title',
        'approval_status'

    ];
}
