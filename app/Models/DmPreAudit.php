<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmPreAudit extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'payee_name',
        'particulars',
        'amount',
        'current_bearer',
        'current_bearer_dept',
        'current_bearer_contact_number',
        'status'
    ];
}