<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SRCTrustReceipt extends Model
{
    use HasFactory;

    protected $table = 'src_trust_receipt';

    protected $fillable = [
        'str_name'
    ];
}
