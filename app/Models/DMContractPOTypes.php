<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMContractPOTypes extends Model
{
    use HasFactory;

    protected $table = "dm_contractpo_types";

    protected $fillable = [
        'cotract_po_type'
    ];
}
