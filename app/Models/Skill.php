<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'level',
        'icon',
    ];

    /**
     * Relasi Many-to-Many: Skill dimiliki oleh banyak Project (melalui project_skill pivot)
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_skill')->withTimestamps();
    }
}

