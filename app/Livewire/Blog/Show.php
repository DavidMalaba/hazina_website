<?php

namespace App\Livewire\Blog;

use Livewire\Component;

class Show extends Component
{
    public \App\Models\Post $post;

    public function mount(\App\Models\Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.blog.show');
    }
}
