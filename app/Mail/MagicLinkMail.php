<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Cohort;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class MagicLinkMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $cohort;
    public $url;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, Cohort $cohort)
    {
        $this->user = $user;
        $this->cohort = $cohort;
        
        $this->url = URL::temporarySignedRoute(
            'magic.login',
            now()->addHours(2),
            ['user' => $this->user->id, 'cohort' => $this->cohort->slug]
        );
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reprenez votre inscription - Hazina',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.magic-link',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
