<?php

namespace App\Livewire\Cohorts\Register;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Inscription - Projet')]
class Step4 extends BaseRegisterComponent
{
    public $motivation = '';
    public $problem_solved = '';
    public $solution_description = '';
    public $project_description = '';
    public $target_market = '';
    public $desired_partners = '';
    public $company_name = '';

    protected function getStepNumber(): int
    {
        return 4;
    }

    protected function loadData(): void
    {
        $registration = $this->getRegistration();
        if ($registration) {
            if ($registration->company) {
                $this->company_name = $registration->company->name;
            }
            $this->motivation = $registration->motivation;
            $this->problem_solved = $registration->problem_solved;
            $this->solution_description = $registration->solution_description;
            $this->project_description = $registration->project_description;
            $this->target_market = $registration->target_market;
            $this->desired_partners = $registration->desired_partners;
        }
    }

    public function rules()
    {
        return [
            'motivation'           => 'required|string|min:20',
            'problem_solved'       => 'required|string|min:20',
            'solution_description' => 'required|string|min:20',
            'project_description'  => 'required|string|min:20',
            'target_market'        => 'nullable|string',
            'desired_partners'     => 'nullable|string',
        ];
    }

    public function submit()
    {
        $this->validate();
        
        $registration = $this->getRegistration();
        
        $registration->update([
            'motivation'           => $this->motivation,
            'problem_solved'       => $this->problem_solved,
            'solution_description' => $this->solution_description,
            'project_description'  => $this->project_description,
            'target_market'        => $this->target_market,
            'desired_partners'     => $this->desired_partners,
            'current_step'         => 'projet',
            'status'               => 'pending' // Marking as completely submitted
        ]);

        $user = Auth::user();
        $company = $registration->company;

        try {
            Mail::to($user->email)->send(
                new \App\Mail\RegistrationConfirmed($user, $company, $registration, $this->cohort)
            );
        } catch (\Exception $e) {
            Log::error("Failed to send registration confirmed email: " . $e->getMessage());
        }

        return redirect()->route('cohorts.register.success', $this->cohort);
    }
    
    public function previousStep()
    {
        return redirect()->route('cohorts.register.step3', $this->cohort);
    }

    public function render()
    {
        return view('livewire.cohorts.register.step4');
    }
}
