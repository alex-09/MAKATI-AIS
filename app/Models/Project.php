<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'appro_id',
        'budget_year_id',
        'department_code_id',
        'program_code_id',
        'AIPCode',
        'project',
        'project_code',
        ];

        public function programs(){
            return $this->belongsTo(Program::class, 'program_code_id', 'program_code');
        }

        public function activities(){
            return $this->hasMany(Activity::class, 'project_code_id', 'project_code');
        }
}
