<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'category',
        'tags',
        'author',
        'author_role',
        'author_avatar',
        'read_time',
        'image',
        'excerpt',
        'content',
        'is_published',
        'is_featured',
        'published_at',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'focus_keyword',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'robots',
        'schema_type',
        'helpful_count',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'helpful_count' => 'integer',
        'published_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('published_at', 'desc');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_published', true)->where('is_featured', true);
    }

    public function scopeCategory($query, $category)
    {
        if ($category && $category !== 'all') {
            return $query->where('category', 'like', "%{$category}%");
        }
        return $query;
    }

    public function getAuthorInitialsAttribute(): string
    {
        if (!empty($this->author_avatar) && strlen($this->author_avatar) <= 3) {
            return strtoupper($this->author_avatar);
        }

        $parts = explode(' ', trim($this->author ?? 'Bluebase Engineering'));
        if (count($parts) >= 2) {
            return strtoupper(substr($parts[0], 0, 1) . substr($parts[count($parts) - 1], 0, 1));
        }
        return strtoupper(substr($parts[0], 0, 2));
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function getEffectiveCategoryNameAttribute(): string
    {
        return $this->blogCategory?->name ?? $this->category ?? 'Engineering';
    }

    public function getCategorySlugAttribute(): string
    {
        return $this->blogCategory?->slug ?? Str::slug($this->category ?? 'engineering');
    }

    public function getSeoTitleAttribute(): string
    {
        return $this->meta_title ?: ($this->title . ' — Bluebase Tech Blog');
    }

    public function getSeoDescriptionAttribute(): string
    {
        return $this->meta_description ?: Str::limit(strip_tags($this->excerpt ?? $this->content), 155);
    }

    public function getImageAttribute($value): string
    {
        $defaultMap = [
            'why-relying-only-on-instagram-facebook-is-risky-for-business' => 'images/blogs/social-media-vs-owned-website.jpg',
            'stop-wasting-money-on-boost-post-get-real-whatsapp-inquiries' => 'images/blogs/whatsapp-meta-ads-leads.jpg',
            'business-trapped-in-excel-whatsapp-how-custom-software-saves-hours' => 'images/blogs/excel-to-custom-software.jpg',
            'how-local-businesses-rank-on-google-maps-get-daily-calls' => 'images/blogs/google-maps-local-seo.jpg',
            'how-much-business-website-cost-transparent-guide' => 'images/blogs/website-cost-pricing-guide.jpg',
            'why-websites-stop-working-guide-to-website-maintenance-for-business-owners' => 'images/blogs/website-maintenance-security.jpg',
            'case-study-how-omg-rental-bikes-automated-fleet-operations-scaled-400-percent' => 'images/blogs/bike-rental-fleet-automation.jpg',
        ];

        if (isset($defaultMap[$this->slug])) {
            if (empty($value) || str_contains($value, 'images/stories/')) {
                return $defaultMap[$this->slug];
            }
        }

        return $value ?: ($defaultMap[$this->slug] ?? 'images/blogs/social-media-vs-owned-website.jpg');
    }

    public function getSeoOgImageAttribute(): string
    {
        if (!empty($this->og_image) && !str_contains($this->og_image, 'images/stories/')) {
            return $this->og_image;
        }
        return $this->image;
    }

    public function getRelatedPosts($limit = 3)
    {
        return static::published()
            ->where('id', '!=', $this->id)
            ->where(function ($q) {
                if ($this->category_id) {
                    $q->where('category_id', $this->category_id);
                } else {
                    $q->where('category', $this->category)
                      ->orWhere('category', 'like', '%' . explode(' ', $this->category)[0] . '%');
                }
            })
            ->take($limit)
            ->get();
    }
}
