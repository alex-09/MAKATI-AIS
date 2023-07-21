<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PCICMContractTypeCI extends Model
{
    use HasFactory;

    protected $table = "pcicm_contract_type_ci";

    protected $fillable =  [
        'transaction_id',
        'payee_name',
        'contract_date',
        'contract_number',
        'item_number',
        'scope_of_works',
        'amount_programmed',
        'percentage_programmed',
        'contract_entry_type'
    ];
}
