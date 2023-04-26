<?php

namespace App\Models;

use App\Http\Controllers\TrustReceipts\DonationPrivateSectorController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationPrivateSector extends Model
{
    protected $table = 'donation_private_sector';

    protected $fillable = [
        'company_name',
        'main_fund_id',
        'sub_fund_id',
        'document_source',
        'general_description',
        'official_receipt_no',
        'official_receipt_date',
        'main_fund_title',
        'sub_fund_title',
        'specific_purpose',
        'amount_allocated',
        'implementing_office',

    ];
}
