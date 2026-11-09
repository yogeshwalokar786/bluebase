<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrialRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'company',
        'phone',
        'cloud_platform',
        'sap_version',
        'status',
        'admin_notes',
    ];
}
