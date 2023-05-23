<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmPaymentTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'payee_name',
        'amount',
        'transac_id',
        'particulars',
        'current_bearer',
        'current_bearer_dept',
        'current_bearer_contact_number',
        'current_bearer_email',
        'status',
    ];
}
