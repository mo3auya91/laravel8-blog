<?php

namespace App\Http\Livewire;

//use App\Models\Post;
use Livewire\Component;

class AllPosts extends Component
{
    public $posts;

//    public function mount($posts)
//    {
//        $this->posts = $posts;
//    }

    public function render()
    {
        // return view('livewire.posts-index', ['posts' => $this->posts]);
        return view('livewire.posts-index');
    }
}
