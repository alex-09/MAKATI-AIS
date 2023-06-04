<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmPayrollAppointCounter extends Model
{
    use HasFactory;

    protected $fillable = [
        'payrollApp_transmital'
    ];
}
