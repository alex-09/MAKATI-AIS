<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $fillable = [
        'budget_year_id',
        'department_code_id',
        'program_code_id',
        'project_code_id',
        'activity_code_id',
        'account_name',
        'account_code',
        'appropriation_amount',
    ];

    public function activities(){
        return $this->belongsTo(Activity::class, 'activity_code_id', 'activity_code');
    }
}
