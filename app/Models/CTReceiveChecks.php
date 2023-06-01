<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CTReceiveChecks extends Model
{
    use HasFactory;
    
    protected $table = 'ct_receive_checks';

    protected $fillable = [

        'transaction_id_num',
        'payee_name',
        'tin_no',
        'dv_no',
        'check_no',
        'account_no',
        'date_of_check',
        'check_amount',
        'particulars',
        'amount',
        'fund_source',
        'cafoa_furs_no',
        'bearer_name',
        'department_office',
        'contact_no',
        'email',
        'status',
        'aa_no',
        'aa_date',
        'dv_date',
        'og_transmital_no',
        'og_sender',
        'og_received_by',
        'og_date'
    ];
}
