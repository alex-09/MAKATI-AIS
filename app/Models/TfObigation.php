<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TfObigation extends Model
{
    use HasFactory;

    protected $fillable = [
        'tf_obli_id',
        'type',
        'furs_amount',
        'implemeting_office',
        'particulars',
        'furs_amount',
        'transaction_type',
        'purchase_req_no',
        'purchase_req_date',
        'payee',
        'requesting_official',
        'processer',
        'reviewer',
        'status'
    ];
}
