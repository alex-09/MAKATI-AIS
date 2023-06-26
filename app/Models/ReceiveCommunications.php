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
        'receive_comm_type_id',
        'subject',
        'department',
        'addressee',
        'email',
        'DRN',
        'reply_to',
        'sender',
        'particulars',
        'contact_no',
        'bearer_name',
        'bearer_address',
        'bearer_contact_no',
        'bearer_department',
        'document',
        'assign_to_id',
        'cluster',
        'restriction',
        'action',
        'no_of_days',
        'status',
        
    ];
}
