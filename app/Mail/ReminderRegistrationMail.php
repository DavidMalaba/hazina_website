<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\CohortRegistration;
use Illuminate\Support\Facades\URL;

class ReminderRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public CohortRegistration $registration;
    public string $resumeUrl;

    /**
     * Create a new message instance.
     */
    public function __construct(CohortRegistration $registration)
    {
        $this->registration = $registration;
        
        // Generate a secure magic link valid for 3 days
        $this->resumeUrl = URL::temporarySignedRoute(
            'magic.login',
            now()->addDays(3),
            ['user' => $registration->user_id, 'cohort' => $registration->cohort->slug]
        );
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Rappel : Finalisez votre candidature pour ' . $this->registration->cohort->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reminder-registration',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
