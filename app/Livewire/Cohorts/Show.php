<?php

namespace App\Livewire\Cohorts;

use Livewire\Component;

class Show extends Component
{
    public \App\Models\Cohort $cohort;

    public function mount(\App\Models\Cohort $cohort)
    {
        $this->cohort = $cohort;
    }

    public function render()
    {
        return view('livewire.cohorts.show')
            ->title($this->cohort->name . ' - Hazina Mining Hub')
            ->layoutData([
                'description' => \Illuminate\Support\Str::limit(html_entity_decode(strip_tags(str_replace(['</p>', '<br>', '<br/>', '<br />'], "\n", $this->cohort->description))), 150),
                'image' => $this->cohort->image,
            ]);
    }
}
