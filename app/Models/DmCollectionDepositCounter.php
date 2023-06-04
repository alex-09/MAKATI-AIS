<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmCollectionDepositCounter extends Model
{
    use HasFactory;

    protected $fillable = [
        'rcd_transmital'
    ];
}
