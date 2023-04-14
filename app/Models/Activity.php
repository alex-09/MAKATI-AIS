<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'appro_id',
        'budget_year_id',
        'department_code_id',
        'program_code_id',
        'project_code_id',
        'activity_code',
        'AIPCode',
        'activity',
        'activity_description',
        'appro_total',
        'appro_total_add',
        'appro_total_deduct',
        'allot_id',
        'allot_total',
        'allot_balance',
        'total_allot_add',
        'total_allot_deduct',
        'total_allot_adjust_balance',
        'total_unallot_balance',
        'obli_id',
        'total_obli',
        'total_obli_add',
        'total_obli_deduct',
        'total_obli_balance',
        'status'

    ];

    public function projects(){
        return $this->belongsTo(Project::class, 'project_code_id', 'project_code');
    }

    public function expenses(){
        return $this->hasMany(Expenses::class, 'activity_code_id', 'activity_code');
    }
}
