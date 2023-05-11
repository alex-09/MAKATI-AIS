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
        'period_covered',
        'date_of_collection',
        'fund_source',
        'amount',
        'description',
        'bearer_name',
        'bearer_dept',
        'bearer_contact_no',
        'status'

    ];
}
