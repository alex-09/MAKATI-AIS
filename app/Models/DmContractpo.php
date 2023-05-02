<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmContractpo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cotract_po_id',
        'transaction_id',
        'contract_no',
        'po_no',
        'payee_name',
        'department_id',
        'amount',
        'description',
        'current_bearer',
        'current_bearer_dept',
        'current_bearer_contact_number',
        'current_bearer_email',
        'status',
    ];
}
