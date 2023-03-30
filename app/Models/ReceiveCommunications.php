<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiveCommunications extends Model
{
    use HasFactory;

    protected $table = 'receive_communications';

    protected $fillable = [

        'transaction_id_num',
        'type',
        'subject',
        'department',
        'email',
        'DRN',
        'reply_to',
        'sender',
        'contact_no',
        'bearer_name',
        'bearer_address',
        'bearer_contact_no',
        'bearer_department',
        'document',
        'assign_to',
        'cluster',
        'restriction',
        'action',
        'no_of_days',
        'status',
        
    ];
}
