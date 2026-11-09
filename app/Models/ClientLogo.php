<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientLogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_path',
        'website_url',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];

    /**
     * Scope to fetch only active client logos in display order.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('display_order', 'asc')->orderBy('id', 'asc');
    }
}
