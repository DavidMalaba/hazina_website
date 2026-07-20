<?php

namespace App\Mail;

use App\Models\PartnerRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PartnerRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $partnerRequest;

    /**
     * Create a new message instance.
     */
    public function __construct(PartnerRequest $partnerRequest)
    {
        $this->partnerRequest = $partnerRequest;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvelle demande de partenariat : ' . $this->partnerRequest->org_name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.partner-request',
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
