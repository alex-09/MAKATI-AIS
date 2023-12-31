<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMBudgetaryObligationsTransac extends Model
{
    use HasFactory;

    protected $table = 'dm_bot';

    protected $fillable = [

        'docu_type_id',
        'transaction_id',
        'department_id',
        'processing_slip_number',
        'description',
        'amount',
        'current_bearer',
        'current_bearer_dept',
        'current_bearer_contact_number',
        'current_bearer_email',
        'processer',
        'reviewer',
        'status',
        'furs_id',
        'cafoa_id',
        'transaction_type',
        'number',
        'og_transmital_no',
        'og_sender',
        'og_received_by',
        'og_date'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
