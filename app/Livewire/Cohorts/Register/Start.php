<?php

namespace App\Livewire\Cohorts\Register;

use Livewire\Component;
use App\Models\Cohort;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Start extends Component
{
    public Cohort $cohort;
    
    public function mount(Cohort $cohort)
    {
        $this->cohort = $cohort;
        
        // If not logged in, just go to step 1
        if (!Auth::check()) {
            return redirect()->route('cohorts.register.step1', $this->cohort);
        }
        
        $registration = Auth::user()->cohortRegistrations()->where('cohort_id', $this->cohort->id)->first();
        
        // If no registration exists, or if it is already submitted, handle accordingly
        if (!$registration) {
            return redirect()->route('cohorts.register.step1', $this->cohort);
        }
        
        if ($registration->status === 'pending' || $registration->status === 'approved' || $registration->status === 'rejected') {
            return redirect()->route('cohorts.register.success', $this->cohort);
        }
        
        // If there is a pending registration, we stay on this page to show the prompt
    }
    
    public function getRegistrationProperty()
    {
        return Auth::check() ? Auth::user()->cohortRegistrations()->where('cohort_id', $this->cohort->id)->first() : null;
    }
    
    public function continueDraft()
    {
        $registration = $this->registration;
        if (!$registration) {
            return redirect()->route('cohorts.register.step1', $this->cohort);
        }
        
        $allowedSteps = [
            'informations_personnelles' => 1,
            'entreprise' => 2,
            'documents' => 3,
            'projet' => 4
        ];
        
        $dbStepNumber = $allowedSteps[$registration->current_step] ?? 1;
        $targetStep = min(4, $dbStepNumber + 1);
        
        return redirect()->route('cohorts.register.step' . $targetStep, $this->cohort);
    }
    
    public function clearDraft()
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        
        return redirect()->route('cohorts.register.step1', $this->cohort);
    }
    
    public function maskedEmail(): string
    {
        if (!Auth::check()) return '—';
        $email = Auth::user()->email;
        if (!$email) return '—';
        $parts = explode('@', $email, 2);
        if (count($parts) < 2) return $email;
        $local = $parts[0];
        $domain = $parts[1];
        $visible = substr($local, 0, 1);
        $masked = $visible . str_repeat('*', max(3, strlen($local) - 1)) . '@' . $domain;
        return $masked;
    }

    public function maskedPhone(): string
    {
        if (!Auth::check()) return '—';
        $phone = Auth::user()->phone;
        if (!$phone) return '—';
        $clean = preg_replace('/\s+/', ' ', trim($phone));
        $len = strlen($clean);
        if ($len <= 5) return str_repeat('*', $len);
        return substr($clean, 0, 3) . str_repeat('*', max(4, $len - 5)) . substr($clean, -2);
    }
    
    public function render()
    {
        $allowedSteps = [
            'informations_personnelles' => 1,
            'entreprise' => 2,
            'documents' => 3,
            'projet' => 4
        ];
        $registration = $this->registration;
        $currentStep = $registration ? ($allowedSteps[$registration->current_step] ?? 1) + 1 : 1;
        $currentStep = min(4, $currentStep);
        
        return view('livewire.cohorts.register.start', [
            'currentStep' => $currentStep,
            'totalSteps' => 4,
            'first_name' => Auth::user()->first_name ?? '',
            'last_name' => Auth::user()->last_name ?? '',
            'email' => Auth::user()->email ?? '',
            'phone' => Auth::user()->phone ?? '',
        ])->layout('components.layouts.app');
    }
}
