<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PEIndividual extends Model
{
    protected $table = 'pe_individual';

    protected $fillable = [

        'type_of_payee_id',
        'client_type',
        'last_name',
        'first_name',
        'middle_name',
        'suffix',
        'building_no',
        'lot_no',
        'street',
        'barangay',
        'municipality_city',
        'province',
        'country',
        'zip_code',
        'date_registered',
        'status',
        'tax',
        'dti',
        'authorized'

    ];
}
