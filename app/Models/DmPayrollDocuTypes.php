<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmPayrollDocuTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'docu_type'
    ];
}
