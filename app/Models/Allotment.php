<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allotment extends Model
{
    use HasFactory;

    protected $fillable = [
        'allot_id',
        'budget_year_id',
        'fund_source',
        'appropriation_type',
        'document_source',
        'program_code_id',
        'project_code_id',
        'activity_code_id',
        'adjustment_type',
        'office_code',
        'document_date',
        'supplemental_budget_no',
        'status',

    ];
}
