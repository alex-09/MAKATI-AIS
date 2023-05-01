<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tfFundDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'tf_id',
        'main_fund_title',
        'sub_fund_title',
        'amount_allocated',
        'specific_purpose',
        'implementing_office'
    ];
}
