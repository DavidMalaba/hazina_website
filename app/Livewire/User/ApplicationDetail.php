<?php

namespace App\Livewire\User;

use App\Models\CohortRegistration;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Détails de la Souscription')]
class ApplicationDetail extends Component
{
    public CohortRegistration $application;

    public function mount($id)
    {
        $this->application = Auth::user()
            ->cohortRegistrations()
            ->with(['cohort', 'company'])
            ->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.user.application-detail');
    }
}
