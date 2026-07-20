<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'is_phone_also', 'status', 'unsubscription_reason'];

    protected $casts = [
        'status' => \App\Enums\SubscriberStatus::class,
    ];
}
