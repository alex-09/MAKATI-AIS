<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PCICMProcessedContractsDeliveryTerm extends Model
{
    use HasFactory;

    protected $table = "pcicm_processed_contracts_delivery_term";

    protected $fillable =  [
        'transaction_id',
        'particulars',
        'delivery_term',
        'due_date',
    ];
}
