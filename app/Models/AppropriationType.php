<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppropriationType extends Model
{
    use HasFactory;

    protected $table = "exec_appropriation_types";

    protected $fillable = [
        'appro_type'
    ];
}
