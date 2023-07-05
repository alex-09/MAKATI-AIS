<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obligation extends Model
{
    use HasFactory;

    protected $table = "exec_obligations";

    protected $fillable =  [
        'obli_id',
        'allot_id',
        'appro_id',
        'budget_year_id',
        'transaction',
        'department',
        'fund_source',
        'processing_slip_no',
        'cafoa_amount',
        'particulars',
        'purchase_req_no',
        'purchase_req_date',
        'payee',
        'requesting_official',
        'cafoa_no',
        'adjustment_date',
        'purchase_contact_no',
        'purchase_contact_date',
        'reason',
        'date_process',
        'status',
        'remarks',
        'assign_processor',
        'assign_reviewer',
    ];
}
