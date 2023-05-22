<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PEBusiness extends Model
{
    protected $table = 'pe_business';

    protected $fillable = [

        'type_of_payee_id',
        'business_name',
        'business_type',
        'building_no',
        'lot_no',
        'street',
        'barangay',
        'municipality_city',
        'province',
        'country',
        'zip_code',
        'tax_id_no',
        'dti_no',
        'section_no',
        'cda_no',
        'authorized_rep',
        'contact_no',
        'email',
        'date_registered',
        'status',
        'receiver'

    ];
}
