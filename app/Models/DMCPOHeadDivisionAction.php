<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMCPOHeadDivisionAction extends Model
{
    use HasFactory;

    protected $table = 'dm_cpo_cityaccount_action';

    protected $fillable = [

        'transaction_no',
        'payee_name',
        'contact_no',	
       'contract_date',	
        'contract_amount',	
        'particulars'
    ];
}
