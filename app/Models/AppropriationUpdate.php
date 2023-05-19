<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppropriationUpdate extends Model
{
    use HasFactory;

    protected $table = "exec_appropriation_updates";

    protected $fillable = [
        'appro_id',
        'AIPCode',
        'adjustment_type',
        'adjustment_no',
        'document_source',
        'date',
        'account_name',
        'account_code',
        'balance',
        'addition', 
        'deduction', 
        'latest_balance'
    ];
}
