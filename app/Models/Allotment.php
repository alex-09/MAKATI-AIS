<?php

namespace App\Models;

use App\Http\Controllers\Allotment\EnrollAllotmentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allotment extends Model
{
    protected $table = 'allotments';
    
    protected $fillable = [

        'id',
        'department',
        'budget_year_id',
        'fund_source',
        'appropriation_type',
        'document_date',
        'document_source',
        'supplemental_budget_no',
        'office_code',
        'program',
        'project',
        'activity',
        'status',
        'adjustment_type'
    ];


}
