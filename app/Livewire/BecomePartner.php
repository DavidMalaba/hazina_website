<?php

namespace App\Livewire;

use Livewire\Component;

class BecomePartner extends Component
{
    public $org_name = '';
    public $org_type = 'Entreprise Minière';
    public $website = '';
    public $contact_name = '';
    public $contact_role = '';
    public $email = '';
    public $phone = '';
    public $interests = [];
    public $message = '';

    protected $rules = [
        'org_name' => 'required|string|max:255',
        'org_type' => 'required|string',
        'website' => 'nullable|url',
        'contact_name' => 'required|string|max:255',
        'contact_role' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:50',
        'interests' => 'required|array|min:1',
        'message' => 'nullable|string',
    ];

    public function submit()
    {
        $this->validate();

        $partnerRequest = \App\Models\PartnerRequest::create([
            'org_name' => $this->org_name,
            'org_type' => $this->org_type,
            'website' => $this->website,
            'contact_name' => $this->contact_name,
            'contact_role' => $this->contact_role,
            'email' => $this->email,
            'phone' => $this->phone,
            'interests' => $this->interests,
            'message' => $this->message,
        ]);

        // Send email to admin
        \Illuminate\Support\Facades\Mail::to(config('mail.from.address', 'hello@hazinahub.com'))->send(new \App\Mail\PartnerRequestReceived($partnerRequest));

        // Send confirmation email to the user
        \Illuminate\Support\Facades\Mail::to($partnerRequest->email)->send(new \App\Mail\PartnerRequestConfirmation($partnerRequest));

        session()->flash('success', 'Votre demande de partenariat a été envoyée avec succès. Notre équipe vous contactera très prochainement.');

        $this->reset(['org_name', 'org_type', 'website', 'contact_name', 'contact_role', 'email', 'phone', 'interests', 'message']);
        $this->org_type = 'Entreprise Minière';
    }

    public function render()
    {
        return view('livewire.become-partner');
    }
}
