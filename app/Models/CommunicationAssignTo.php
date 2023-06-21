<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_communication_assign_to extends Model
{
    use HasFactory;

    protected $table = "create_communication_assign_tos";
    
    protected $fillanble = [
        'transac_id',
        'assigned_to'
    ];
}
