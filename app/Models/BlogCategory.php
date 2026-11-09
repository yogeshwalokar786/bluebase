<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_description',
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

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }

    public function publishedBlogs()
    {
        return $this->hasMany(Blog::class, 'category_id')
            ->where('is_published', true)
            ->orderBy('published_at', 'desc');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('display_order')->orderBy('name');
    }

    public function getUrlAttribute(): string
    {
        return route('blog.category', $this->slug);
    }
}
