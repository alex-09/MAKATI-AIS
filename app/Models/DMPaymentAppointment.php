<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMPaymentAppointment extends Model
{
    use HasFactory;

    protected $table = 'dm_payment_appointment';

    protected $fillable = [


        'transaction_id_no',
        'transaction_type',
        'fund_source',
        'cafoa_obr',
        'caf',
        'department',
        'payroll_type',
        'personnel_number',
        'employment_type',
        'amount',
        'covered_from',
        'covered_to',
        'subject',
        'bearer_name',
        'bearer_address',
        'bearer_contact',
        'bearer_dept',
        'document',
        'appointment_status',
        'status',
        'og_transmital_no',
        'og_sender',
        'og_received_by',
        'og_date'

    ];
}
