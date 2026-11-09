<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'thumbnail_url',
        'demo_url',
        'github_url',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    /**
     * Relasi Many-to-Many: Project menggunakan banyak Skill (melalui project_skill pivot)
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'project_skill')->withTimestamps();
    }

    /**
     * Accessor untuk kompatibilitas frontend Blade
     */
    public function getTechStackAttribute()
    {
        return $this->skills->pluck('name')->implode(', ');
    }

    public function getImagePathAttribute()
    {
        return $this->thumbnail_url;
    }

    public function getLinkAttribute()
    {
        return $this->demo_url ?? $this->github_url;
    }
}
