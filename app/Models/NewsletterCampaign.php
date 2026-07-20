<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterCampaign extends Model
{
    protected $fillable = [
        'name',
        'send_email',
        'email_subject',
        'email_content',
        'send_whatsapp',
        'whatsapp_content',
        'send_sms',
        'sms_content',
        'sent_at'
    ];

    protected $casts = [
        'sent_at' => 'datetime',
        'send_email' => 'boolean',
        'send_whatsapp' => 'boolean',
        'send_sms' => 'boolean',
    ];
}
