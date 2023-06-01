<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmPreauditCounter extends Model
{
    use HasFactory;

    protected $fillable = [
        'preaud_transmital'
    ];
}
