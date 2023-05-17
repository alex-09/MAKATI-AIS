<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppropriationExpenses extends Model
{
    use HasFactory;

    protected $table = "exec_appropriation_expenses";

    protected $fillable = [
        'appro_id',
        'AIPCode',
        'account_name',
        'account_code',
        'appro_amount', 
        'latest_appro_amount'
    ];
}
