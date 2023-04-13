<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allotment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appro_id',
        'allot_id',
        'budget_year_id',
        'fundSource_id',
        'approType_id',
        'document_source',
        'program_code_id',
        'project_code_id',
        'activity_code_id',
        'AIPCode',
        'adjustment_type',
        'department_code_id',
        'document_date',
        'supplemental_budget_no',
        'status',

    ];
}
