<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LGUCounterpart extends Model
{
    protected $table = 'trustfunds_lgu_counterpart';

    protected $fillable = [
        'tf_tlc_id',
        'general_description',
        'legal_basis',
        'remarks'

    ];
}
