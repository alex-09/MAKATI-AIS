<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMODPreviousTransac extends Model
{
    use HasFactory;

    protected $table = 'dm_od_previoustransac';

    protected $fillable = [

        'transaction_id_no',
        'particulars',
        'date',
        'fund_source',
        'bearer_name',
        'department_office',
        'contact_no',
        'email'
    ];
}
