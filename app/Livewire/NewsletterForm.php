<?php

namespace App\Livewire;

use Livewire\Component;

class NewsletterForm extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $is_phone_also = false;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email|unique:newsletter_subscribers,email',
        'phone' => 'nullable|string|max:20',
        'is_phone_also' => 'boolean',
    ];

    protected $messages = [
        'email.unique' => 'Cet email est déjà abonné à notre newsletter.',
    ];

    public function subscribe()
    {
        $this->validate();

        \App\Models\NewsletterSubscriber::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'is_phone_also' => $this->is_phone_also,
        ]);

        session()->flash('success', 'Merci pour votre abonnement !');
        $this->reset(['name', 'email', 'phone', 'is_phone_also']);
    }

    public function render()
    {
        return view('livewire.newsletter-form');
    }
}
