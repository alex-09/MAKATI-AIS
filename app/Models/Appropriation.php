<?php

namespace App\Models;

use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appropriation extends Model
{
    use HasFactory;

    protected $table = "exec_appropriations";
    
    protected $fillable = [
        'appro_id',
        'budget_year_id',
        'fundSource_id',
        'reference_document',
        'approType_id',
        'department_code_id',
        'date_document',
        'status'
    ];

    public function programs(){
        
        return $this->hasMany(Program::class, 'appro_id', 'appro_id');
    }
}
