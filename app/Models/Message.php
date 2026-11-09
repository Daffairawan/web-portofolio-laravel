<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_name',
        'sender_email',
        'subject',
        'body',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Accessor untuk kompatibilitas form lama
     */
    public function getNameAttribute()
    {
        return $this->sender_name;
    }

    public function getEmailAttribute()
    {
        return $this->sender_email;
    }

    public function getContentAttribute()
    {
        return $this->body;
    }
}
