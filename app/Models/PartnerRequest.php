<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerRequest extends Model
{
    protected $fillable = [
        'org_name',
        'org_type',
        'website',
        'contact_name',
        'contact_role',
        'email',
        'phone',
        'interests',
        'message',
        'is_read',
    ];

    protected $casts = [
        'interests' => 'array',
        'is_read' => 'boolean',
    ];
}
