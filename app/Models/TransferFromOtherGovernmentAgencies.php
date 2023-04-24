<?php

namespace App\Models;

use App\Http\Controllers\TrustReceipts\EnrollTransReceiptController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferFromOtherGovernmentAgencies extends Model
{
    protected $table = 'transfer_other_government_agencies';

    protected $fillable = [
        'main_fund_id',
        'sub_fund_id',
        'government_type',
        'agency_name',
        'document_source',
        'general_description',
        'nadai_no',
        'official_receipt_no',
        'official_receipt_date',
        'official_receipt_amount',
        'nadai_date',
        'main_fund_title',
        'sub_fund_title',
        'specific_purpose',
        'amount_allocated',
        'implementing_office',

    ];
}
