<?php

namespace App\Livewire;

use Livewire\Component;

class FloatingCohortWidget extends Component
{
    public $cohort;
    public $showWidget = false;

    public function mount()
    {
        $currentRoute = request()->route()->getName();
        
        // Hide widget on specific pages
        if (in_array($currentRoute, ['cohorts.show', 'cohorts.register', 'dashboard', 'login', 'register', 'profile'])) {
            $this->showWidget = false;
            return;
        }

        $this->cohort = \App\Models\Cohort::where('status', 'open')
            ->where(function ($query) {
                $query->where(function ($q) {
                    $q->whereNull('registration_start_date')
                      ->orWhereDate('registration_start_date', '<=', today());
                })->where(function ($q) {
                    $q->whereNull('registration_end_date')
                      ->orWhereDate('registration_end_date', '>=', today());
                });
            })
            ->latest()
            ->first();

        if ($this->cohort) {
            $this->showWidget = true;
        }
    }

    public function render()
    {
        return view('livewire.floating-cohort-widget');
    }
}
