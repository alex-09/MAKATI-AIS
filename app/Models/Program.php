<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'appro_id',
        'budget_year_id',
        'department_code_id',
        'AIPCode',
        'program',
        'program_code',
    ];

    public function appropriations() {
        return $this->belongsTo(Appropriation::class, 'appro_id', 'appro_id');
    }

    public function projects(){
        return $this->hasMany(Project::class, 'program_code_id', 'program_code');
    }
}
