<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmContractpo extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'contract_no',
        'po_no',
        'po_date',
        'payee_name',
        'department_id',
        'amount',
        'description',
        'current_bearer',
        'current_bearer_dept',
        'current_bearer_contact_number',
        'current_bearer_email',
        'assign_to',
        'status',
        'og_transmital_no',
        'og_sender',
        'og_received_by',
        'og_date'
    ];
}
