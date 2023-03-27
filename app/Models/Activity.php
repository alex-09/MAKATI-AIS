<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'budget_year_id',
        'department_code_id',
        'program_code_id',
        'project_code_id',
        'activity',
        'activity_code',
        'activity_description',
        'expenses',

    ];
}
