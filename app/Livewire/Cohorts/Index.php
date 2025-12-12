<?php

namespace App\Livewire\Cohorts;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.cohorts.index', [
            'cohorts' => \App\Models\Cohort::orderBy('start_date', 'desc')->get()
        ]);
    }
}
