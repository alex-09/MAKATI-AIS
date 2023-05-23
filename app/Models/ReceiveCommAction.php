<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiveCommAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'action_type'
    ];
}
