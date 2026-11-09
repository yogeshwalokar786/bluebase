<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'tagline',
        'icon',
        'summary',
        'description',
        'features',
        'is_active',
        'display_order',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];
}
