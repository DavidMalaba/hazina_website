<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Mes Souscriptions')]
class Applications extends Component
{
    public function getApplicationsProperty()
    {
        return Auth::user()->cohortRegistrations()->with('cohort')->orderBy('updated_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.user.applications', [
            'applications' => $this->applications
        ]);
    }
}
