<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PCICMProcessedContracts extends Model
{
    use HasFactory;

    protected $table = "pcicm_processed_contracts";

    protected $fillable =  [
        'transaction_id',
        'contract_type',
        'contract_date',
        'contract_amount',
        'contract_number',
        'procurement',
        'purchase_req_no',
        'cost_estimate_num',
        'project_name',
        'payee_name',
        'payee_address',
        'name_of_authorized',
        'payee_designation',
        'payee_contact_number',
        'company_tin',
        'place_of_delivery',
        'payment_terms',
        'assign_to',
        'status',
    ];
}
