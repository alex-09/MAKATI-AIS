<?php

namespace App\Models;

use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appropriation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'appro_id',
        'budget_year_id',
        'fund_source',
        'reference_document',
        'adjustment_type',
        'appropriation_type_id',
        'department',
        'department_code_id',
        'supp_budget_num',
        'date_document',
        'status'
    ];

    public function programs(){
        
        return $this->hasMany(Program::class, 'appro_id', 'appro_id');
    }
}
