<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'client_role',
        'company_name',
        'quote',
        'rating',
        'avatar',
        'is_active',
        'display_order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];
}

