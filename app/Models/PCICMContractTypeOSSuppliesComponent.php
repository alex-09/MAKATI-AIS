<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PCICMContractTypeOSSuppliesComponent extends Model
{
    use HasFactory;

    protected $table = "pcicm_contract_type_os_supplies_component";

    protected $fillable =  [
        'transaction_id',
        'payee_name',
        'contract_date',
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
