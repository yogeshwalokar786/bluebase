<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerApplication extends Model
{
    protected $fillable = [
        'partner_type',
        'company_name',
        'contact_name',
        'email',
        'phone',
        'country',
        'message',
        'status',
        'admin_notes',
    ];
}
