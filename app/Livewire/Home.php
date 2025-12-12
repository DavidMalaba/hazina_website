<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'latestPosts' => \App\Models\Post::latest('published_at')->take(3)->get(),
            'upcomingCohorts' => \App\Models\Cohort::whereIn('status', ['open', 'upcoming'])
                ->orderBy('start_date', 'asc')
                ->take(3)
                ->get()
        ]);
    }
}
