<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appropriation extends Model
{
    protected $fillable = [
        'budget_year',
        'fund_source',
        'reference_document',
        'appropriation_type',
        'department',
        'office_code',
        'status',
    ];
}
