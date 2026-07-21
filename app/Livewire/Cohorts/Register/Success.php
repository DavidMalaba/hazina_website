<?php

namespace App\Livewire\Cohorts\Register;

use App\Models\Cohort;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Inscription - Succès')]
class Success extends Component
{
    public Cohort $cohort;
    public string $first_name = '';
    public string $company_name = '';

    public function mount(Cohort $cohort)
    {
        $this->cohort = $cohort;
        
        // Ensure they have actually submitted
        if (!Auth::check()) {
            return redirect()->route('cohorts.register.step1', $this->cohort);
        }
        
        $registration = Auth::user()->cohortRegistrations()->where('cohort_id', $this->cohort->id)->first();
        if (!$registration || $registration->status === 'draft') {
            return redirect()->route('cohorts.register.step1', $this->cohort);
        }

        $this->first_name = Auth::user()->first_name;
        $this->company_name = $registration->company ? $registration->company->name : 'votre entreprise';
    }

    public function logoutAndRegisterAgain()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        
        return redirect()->route('cohorts.register.step1', $this->cohort);
    }

    public function render()
    {
        return view('livewire.cohorts.register.success');
    }
}
