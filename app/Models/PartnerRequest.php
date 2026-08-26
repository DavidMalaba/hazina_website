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
        'opt_in_email', 'opt_in_sms', 'opt_in_whatsapp',
        'is_read',
    ];

    protected $casts = [
        'interests' => 'array',
        'is_read' => 'boolean',
    ];
}
