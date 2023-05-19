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
        'addition', 
        'deduction', 
        'latest_balance'
    ];
}
