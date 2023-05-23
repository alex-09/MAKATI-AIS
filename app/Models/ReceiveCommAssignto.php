<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiveCommAssignto extends Model
{
    use HasFactory;

    protected $fillable = [
        'assign_to_type',
    ];
}
