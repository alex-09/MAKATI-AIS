<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppropriationDetails extends Model
{
    use HasFactory;

    protected $table = "exec_appropriation_details";

    protected $fillable = [
        'appro_id',
        'budget_year_id',
        'department_code_id',
        'AIPCode',
        'program_code',
        'program',
        'project_code',
        'project',
        'activity_code',
        'activity',
        'activity_description',
        'appro_total',
        'latest_appro_total',
        'type',
        'status',
        'remarks'
    ];
}
