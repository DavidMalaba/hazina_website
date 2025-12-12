<?php

namespace App\Livewire\Cohorts;

use Livewire\Component;

class Show extends Component
{
    public \App\Models\Cohort $cohort;
    
    public $name = '';
    public $email = '';
    public $phone = '';
    public $project_description = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'required',
        'project_description' => 'required|min:20',
    ];

    public function mount(\App\Models\Cohort $cohort)
    {
        $this->cohort = $cohort;
    }

    public function register()
    {
        $this->validate();

        $this->cohort->registrations()->create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'project_description' => $this->project_description,
        ]);

        session()->flash('message', 'Votre candidature a été enregistrée avec succès ! Nous vous contacterons bientôt.');
        $this->reset(['name', 'email', 'phone', 'project_description']);
    }

    public function render()
    {
        return view('livewire.cohorts.show');
    }
}
