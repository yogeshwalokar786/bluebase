<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CaseStudy extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'featured_stats' => 'array',
        'stats_pills' => 'array',
        'technologies' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'display_order' => 'integer',
        'published_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($story) {
            if (empty($story->slug)) {
                $story->slug = Str::slug($story->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('display_order', 'asc')->orderBy('published_at', 'desc');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_published', true)->where('is_featured', true)->orderBy('display_order', 'asc');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc')->orderBy('created_at', 'desc');
    }

    public function getUrlAttribute(): string
    {
        return route('customer-stories.show', $this->slug);
    }

    public function getHeroImageAttribute($value): string
    {
        if (!empty($value)) {
            return $value;
        }

        // Default fallbacks based on slug
        return match ($this->slug) {
            'omg-rental-bikes' => 'images/stories/omg-rental-bikes-brand.png',
            'aarohi-classic-2024' => 'images/stories/aarohi-classic-brand.png',
            'indiamart-lead-automation' => 'images/stories/pharma-export-automation.jpg',
            default => 'images/stories/omg-rental-bikes-brand.png',
        };
    }

    public function getSeoTitleAttribute(): string
    {
        return $this->meta_title ?: ($this->title . ' | Bluebase Technologies');
    }

    public function getSeoDescriptionAttribute(): string
    {
        return $this->meta_description ?: ($this->excerpt ?: Str::limit(strip_tags($this->content ?? ''), 160));
    }
}
