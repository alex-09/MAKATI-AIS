<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmPayrollTransacTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'transac_type'
    ];
}
