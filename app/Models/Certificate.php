<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'issuer',
        'issued_date',
        'credential_url',
        'description',
    ];

    protected $casts = [
        'issued_date' => 'date',
    ];
}

