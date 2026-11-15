<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobOpening extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'department',
        'category',
        'location',
        'type',
        'experience',
        'description',
        'skills_tags',
        'apply_email',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($job) {
            if (empty($job->slug)) {
                $job->slug = Str::slug($job->title);
            }
            if (empty($job->apply_email)) {
                $job->apply_email = 'info@bluebasetechnologies.com';
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->orderBy('display_order', 'asc')
            ->orderBy('id', 'asc');
    }

    public function getSkillsListAttribute(): array
    {
        if (empty($this->skills_tags)) {
            return [];
        }

        return array_map('trim', explode(',', $this->skills_tags));
    }

    public function getCategoryLabelAttribute(): string
    {
        return match ($this->category) {
            'backend' => 'Backend & Full-Stack',
            'ai' => 'AI & Machine Learning',
            'mobile-cloud' => 'Mobile & DevOps',
            'design' => 'Design & Architecture',
            default => ucfirst(str_replace('-', ' ', $this->category)),
        };
    }
}
