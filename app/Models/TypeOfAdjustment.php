<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfAdjustment extends Model
{
    use HasFactory;

    protected $fillable = [
        'adjustment_type'
    ];
}
