<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PCICMContractTypeOSLaborComponent extends Model
{
    use HasFactory;

    protected $table = "pcicm_contract_type_os_labor_component";

    protected $fillable =  [
        'transaction_id',
        'payee_name',
        'contract_date',
        'item_number',
        'unit',
        'quantity',
        'description',
        'rate_per_period',
        'total_cost_per_period',
        'number_of_period',
        'total_cost',
        'contract_entry_type'
    ];
}
