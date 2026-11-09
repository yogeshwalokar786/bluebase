<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemoBooking extends Model
{
    protected $fillable = [
        'name',
        'email',
        'company',
        'phone',
        'job_title',
        'current_erp',
        'interested_product',
        'notes',
        'admin_notes',
        'status',
    ];
}
