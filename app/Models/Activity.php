<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        
        // 'project',
        'activity',
        'activity_code',
        'activity_description',
        'allotment',
        'expenses',
        'appropriation_amount',
        'balance',

    ];
}
