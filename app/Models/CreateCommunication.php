<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateCommunication extends Model
{
    use HasFactory;

    protected $fillable = [
        'mc_no',
        'transac_id',
        'receive_comm_type_id',
        'sender',
        'subject',
        'reply_to',
        'creator',
        'document',
        'department',
        'particulars',
        'assign_to_id',
        'cluster',
        'restriction',
        'action',
        'no_of_days',
        'status',
        'og_transmital_no',
        'og_memo_no',
        'og_sender',
        'og_received_by',
        'og_date'
    ];
}
