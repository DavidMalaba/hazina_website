<?php

namespace App\Livewire\Blog;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.blog.index', [
            'posts' => \App\Models\Post::whereNotNull('published_at')
                ->orderBy('published_at', 'desc')
                ->paginate(9)
        ]);
    }
}
