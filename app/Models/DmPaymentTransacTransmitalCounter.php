<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmPaymentTransacTransmitalCounter extends Model
{
    use HasFactory;

    protected $fillable = [
        'paytransac_counter'
    ];
}
