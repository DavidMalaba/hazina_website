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

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'nullable|string|max:20',
        'subject' => 'required|min:5',
        'message' => 'required|min:10',
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
        ]);

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
