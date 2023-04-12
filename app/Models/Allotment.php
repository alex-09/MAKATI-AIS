<?php

namespace App\Models;

use App\Http\Controllers\Allotment\EnrollAllotmentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allotment extends Model
{
    protected $table = 'allotments';

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
