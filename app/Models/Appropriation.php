<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appropriation extends Model
{
    protected $fillable = [
        'budget_year_id',
        'fund_source',
        'reference_document',
        'appropriation_type_id',
        'department',
        'department_code_id',
        'status',
    ];
}
