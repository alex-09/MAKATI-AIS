<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferFromOtherGovernmentAgencies extends Model
{
    protected $table = 'transfer_other_government_agencies';

    protected $fillable = [
        'tf_id',
        'government_type',
        'agency_name',
        'document_source',
        'general_description',
        'nadai_no',
        'official_receipt_no',
        'official_receipt_date',
        'official_receipt_amount',
        'nadai_date',
        'remarks',
        'status',
        'tr_type'
    ];
}
