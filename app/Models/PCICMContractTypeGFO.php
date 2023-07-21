<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PCICMContractTypeGFO extends Model
{
    use HasFactory;
    
    protected $table = "pcicm_contract_type_gfo";

    protected $fillable =  [
        'transaction_id',
        'payee_name',
        'contract_date',
        'contract_number',
        'stock_property_number',
        'unit',
        'description',
        'brand',
        'quantity',
        'unit_cost',
        'total_cost',
        'contract_entry_type'
    ];
}
