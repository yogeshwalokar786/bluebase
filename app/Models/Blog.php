<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
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
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
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

    public function getCategorySlugAttribute(): string
    {
        return Str::slug($this->category);
    }

    public function getRelatedPosts($limit = 3)
    {
        return static::published()
            ->where('id', '!=', $this->id)
            ->where(function ($q) {
                $q->where('category', $this->category)
                  ->orWhere('category', 'like', '%' . explode(' ', $this->category)[0] . '%');
            })
            ->take($limit)
            ->get();
    }
}
