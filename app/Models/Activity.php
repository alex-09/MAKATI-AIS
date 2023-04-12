<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'appro_id',
        'program_code_id',
        'project_code_id',
        'activity',
        'activity_code',
        'activity_description',
        'appro_total',
        'appro_total_add',
        'appro_total_deduct',
        'allot_total',
        'balance',
        'total_allot_add',
        'total_allot_deduct',
        'total_allot_adjust_balance',
        'total_unallot_balance',
        'total_obli',

    ];

    public function projects(){
        return $this->belongsTo(Project::class, 'project_code_id', 'project_code');
    }

    public function expenses(){
        return $this->hasMany(Expenses::class, 'activity_code_id', 'activity_code');
    }
}
