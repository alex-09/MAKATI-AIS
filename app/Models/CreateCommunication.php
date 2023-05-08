<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateCommunication extends Model
{
    use HasFactory;

    protected $fillable = [
        'transac_id',
        'type',
        'sender',
        'subject',
        'reply_to',
        'creator',
        'document'
    ];
}
