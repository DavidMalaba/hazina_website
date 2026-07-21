<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Tableau de Bord')]
class Dashboard extends Component
{
    public function getActiveApplicationsProperty()
    {
        return Auth::user()->cohortRegistrations()
            ->with('cohort')
            ->whereIn('status', ['pending', 'approved'])
            ->orderBy('updated_at', 'desc')
            ->take(2)
            ->get();
    }

    public function getDraftApplicationsProperty()
    {
        return Auth::user()->cohortRegistrations()
            ->with('cohort')
            ->where('status', 'draft')
            ->orderBy('updated_at', 'desc')
            ->take(2)
            ->get();
    }

    public function render()
    {
        return view('livewire.user.dashboard', [
            'activeApplications' => $this->activeApplications,
            'draftApplications' => $this->draftApplications,
        ]);
    }
}
