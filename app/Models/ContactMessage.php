<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'subject', 'message',
        'opt_in_email', 'opt_in_sms', 'opt_in_whatsapp', 'is_read', 'replied_at', 'replied_by'];

    protected $casts = [
        'is_read' => 'boolean',
        'replied_at' => 'datetime',
    ];

    public function replier()
    {
        return $this->belongsTo(\App\Models\User::class, 'replied_by');
    }
}
