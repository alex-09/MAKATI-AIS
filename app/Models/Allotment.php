<?php

namespace App\Models;

use App\Http\Controllers\Allotment\EnrollAllotmentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allotment extends Model
{
    protected $table = 'exec_allotments';

    protected $fillable = [
        'appro_id',
        'allot_id',
        'budget_year_id',
        'fundSource_id',
        'approType_id',
        'department_code_id',
        'status'
    ];
}
