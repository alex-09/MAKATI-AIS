<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'appro_id',
        'program',
        'program_code',
    ];

    public function appropriations() {
        return $this->belongsTo(Appropriation::class, 'appro_id', 'appro_id');
    }
}
