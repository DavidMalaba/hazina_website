<?php

namespace App\Livewire;

use Livewire\Component;

class FloatingCohortWidget extends Component
{
    public $cohort;
    public $showWidget = false;

    public function mount()
    {
        $currentRoute = request()->route()?->getName();
        
        // Show widget ONLY on these specific public pages
        $allowedRoutes = [
            'home', 'about', 'mission-vision', 'solutions', 'cohorts.index',
            'programs', 'partners', 'become-partner', 'blog.index', 'blog.show', 'contact'
        ];

        if (!in_array($currentRoute, $allowedRoutes)) {
            $this->showWidget = false;
            return;
        }

        $this->cohort = \App\Models\Cohort::where('status', 'open')
            ->whereDate('registration_start_date', '<=', today())
            ->whereDate('registration_end_date', '>=', today())
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
