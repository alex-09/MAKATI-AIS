<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMODNewTransac extends Model
{
    use HasFactory;

    protected $table = 'dm_od_newtransac';

    protected $fillable = [

        'transaction_id_no',
        'particulars',
        'date',
        'fund_source',
        'bearer_name',
        'department_office',
        'contact_no',
        'email',
        'status',
        'department',
        'document_type',
        'document_no',
        'og_transmital_no',
        'og_sender',
        'og_received_by',
        'og_date'

    ];
}
