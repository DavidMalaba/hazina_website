<?php

namespace App\Livewire\Cohorts\Register;

use Livewire\Component;
use App\Models\Cohort;
use Illuminate\Support\Facades\Auth;

abstract class BaseRegisterComponent extends Component
{
    public Cohort $cohort;
    
    // Abstract property to define which step this component is handling (1, 2, 3, or 4)
    abstract protected function getStepNumber(): int;
    
    // Return the string equivalent of the DB step
    protected function getStepName(int $step): string
    {
        return match ($step) {
            1 => 'informations_personnelles',
            2 => 'entreprise',
            3 => 'documents',
            4 => 'projet',
            default => 'informations_personnelles',
        };
    }
    
    // Mount function that enforces security
    public function mount(Cohort $cohort)
    {
        $this->cohort = $cohort;
        
        $this->enforceStepSecurity();
        $this->loadData();
    }
    
    protected function getRegistration()
    {
        if (Auth::check()) {
            return Auth::user()->cohortRegistrations()->where('cohort_id', $this->cohort->id)->first();
        }
        return null;
    }
    
    protected function enforceStepSecurity()
    {
        $stepNumber = $this->getStepNumber();
        
        // Step 1 is always accessible
        if ($stepNumber === 1) {
            return;
        }
        
        // For Steps 2, 3, 4, User MUST be logged in
        if (!Auth::check()) {
            return redirect()->route('cohorts.register.step1', $this->cohort);
        }
        
        $registration = $this->getRegistration();
        
        // If no registration exists, they must start at step 1
        if (!$registration) {
            return redirect()->route('cohorts.register.step1', $this->cohort);
        }
        
        // Check allowed step
        $allowedSteps = [
            'informations_personnelles' => 1,
            'entreprise' => 2,
            'documents' => 3,
            'projet' => 4
        ];
        
        $dbStepNumber = $allowedSteps[$registration->current_step] ?? 1;
        
        // You cannot access a step higher than your DB step + 1 
        // Wait, current_step is the step they last SAVED, so they are currently allowed to be on (current_step + 1)
        // Actually, if current_step='informations_personnelles', they have finished step 1, so they are allowed on step 2.
        // So allowed_max = $dbStepNumber + 1.
        $allowedMax = $dbStepNumber + 1;
        
        if ($stepNumber > $allowedMax) {
            // Redirect them to their maximum allowed step
            $targetRoute = 'cohorts.register.step' . min(4, $allowedMax);
            return redirect()->route($targetRoute, $this->cohort);
        }
    }
    
    // Force child classes to implement data loading
    abstract protected function loadData(): void;
}
