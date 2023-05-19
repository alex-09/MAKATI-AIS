<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllotmentDetails extends Model
{
    use HasFactory;

    protected $table = "exec_allotment_details";

    protected $fillable = [
        'appro_id',
        'allot_id',
        'budget_year_id',
        // 'department_code_id',
        'AIPCode',
        'program_code',
        'program',
        'project_code',
        'project',
        'activity_code',
        'activity',
        'activity_description',
        'allot_total', 
        'latest_allot_total',
        'type',
        'status',
        'remarks'
    ];  
}
