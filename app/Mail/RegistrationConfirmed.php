<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $company;
    public $registration;
    public $cohort;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $company, $registration, $cohort)
    {
        $this->user = $user;
        $this->company = $company;
        $this->registration = $registration;
        $this->cohort = $cohort;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation de votre candidature : ' . $this->cohort->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.cohorts.registration-confirmed',
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
