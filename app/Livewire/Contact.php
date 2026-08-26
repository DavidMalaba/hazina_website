<?php

namespace App\Livewire;

use Livewire\Component;

class Contact extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $subject = '';
    public $message = '';
    public $opt_in_email = true;
    public $opt_in_sms = true;
    public $opt_in_whatsapp = true;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'nullable|string|max:20',
        'subject' => 'required|min:5',
        'message' => 'required|min:10',
        'opt_in_email' => 'boolean',
        'opt_in_sms' => 'boolean',
        'opt_in_whatsapp' => 'boolean',
    ];

    public function submit()
    {
        $this->validate();

        $contactMessage = \App\Models\ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
            'opt_in_email' => $this->opt_in_email,
            'opt_in_sms' => $this->opt_in_sms,
            'opt_in_whatsapp' => $this->opt_in_whatsapp,
        ]);

        if ($this->opt_in_email || $this->opt_in_sms || $this->opt_in_whatsapp) {
            $subscriber = \App\Models\NewsletterSubscriber::firstOrNew(['email' => $this->email]);
            $subscriber->name = $this->name;
            if ($this->phone) {
                $subscriber->phone = $this->phone;
            }
            $subscriber->status = \App\Enums\SubscriberStatus::Active;
            $subscriber->accepts_email = $this->opt_in_email;
            $subscriber->accepts_sms = $this->opt_in_sms;
            $subscriber->accepts_whatsapp = $this->opt_in_whatsapp;
            $subscriber->save();
        }

        // Send email to admin (replace with actual admin email in production)
        \Illuminate\Support\Facades\Mail::to(config('mail.from.address', 'hello@hazinahub.com'))->send(new \App\Mail\ContactMessageReceived($contactMessage));

        // Send confirmation email to the user
        \Illuminate\Support\Facades\Mail::to($contactMessage->email)->send(new \App\Mail\ContactAcknowledgement($contactMessage));

        session()->flash('success', 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.');

        $this->reset(['name', 'email', 'phone', 'subject', 'message']);
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
