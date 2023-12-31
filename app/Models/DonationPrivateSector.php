<?php

namespace App\Models;

use App\Http\Controllers\TrustReceipts\DonationPrivateSectorController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationPrivateSector extends Model
{
    protected $table = 'donation_private_sector';

    protected $fillable = [
        'tf_id',
        'company_name',
        'document_source',
        'general_description',
        'official_receipt_no',
        'official_receipt_date',
        'official_receipt_amount',
        'remarks',
        'tr_type',
        'status'
    ];
}
