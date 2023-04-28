<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMDocumentType extends Model
{
    use HasFactory;

    protected $table = 'dm_bot_document_type';

    protected $fillable = [

        'document_type'
    ];
}
