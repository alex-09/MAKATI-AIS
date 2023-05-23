<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMCollectionDeposit extends Model
{
    use HasFactory;

    protected $table = 'dm_collection_deposit';

    protected $fillable = [

            'incom_transaction_id_no',
            'transaction_type',
            'sender',
            'fund_source',
            'rcd_date',
            'report_no',
            'cashbook_ref_no',
            'subject',
            'amount_collection',
            'cash',
            'check',
            'online',
            'bearer_name',
            'address',
            'department_office',
            'bearer_contact_no',
            'status'

    ];
}
