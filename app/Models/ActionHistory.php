<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionHistory extends Model
{
    use HasFactory;

    protected $table = 'action_histories';

    protected $fillable = [

        'type_id',
        'type',
        'particulars',
        'user',

    ];
}
