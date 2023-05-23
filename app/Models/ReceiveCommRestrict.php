<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiveCommRestrict extends Model
{
    use HasFactory;

    protected $fillable = [
        'restrict_type'
    ];
}
