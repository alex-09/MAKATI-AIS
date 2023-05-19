<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PEGovernmentAgency extends Model
{
    protected $table = 'pe_government_agency';

    protected $fillable = [

        'type_of_payee_id',
        'agency_name',
        'building_no',
        'lot_no',
        'street',
        'barangay',
        'municipality_city',
        'province',
        'country',
        'zip_code',
        'tax_id_no',
        'authorized_rep',
        'contact_no',
        'email',
        'date_registered',
        'status',
        'receiver'

    ];
}
