<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class AllPosts extends Component
{
    public $posts;
    public $category_id = 'all';
    public $search_word = null;

    protected $listeners = [
        'filterByCategoryId' => 'filterByCategoryId',
        'filterBySearchWord' => 'filterBySearchWord',
    ];

    public function filterByCategoryId($category_id)
    {
        $this->category_id = $category_id;
        $this->getPosts();
    }

    public function filterBySearchWord($search_word)
    {
        $this->search_word = $search_word['search_word'];
        $this->getPosts();
    }

    public function mount()
    {
        $this->getPosts();
    }

    public function render()
    {
        return view('livewire.posts-index');
    }

    public function getPosts()
    {
        $items = Post::query();
        if ($this->search_word) {
            $items->where(function ($q) {
//                $q->whereRaw("JSON_EXTRACT(title, '$.en') LIKE '%' . $this->search_word . '%'");
//                $q->where('title', 'like', '%' . $this->search_word . '%')
//                    ->orWhere('content', 'like', '%' . $this->search_word . '%');
                $q->where('title->ar', 'like', '%' . $this->search_word . '%')
                    ->orWhere('title->en', 'like', '%' . $this->search_word . '%')
                    ->orWhere('content->en', 'like', '%' . $this->search_word . '%')
                    ->orWhere('content->ar', 'like', '%' . $this->search_word . '%');
            });
        }

        if ($this->category_id != 'all') {
            $items->whereHas('categories', function ($q) {
                $q->where('categories.id', $this->category_id);
            });
        }

        $this->posts = $items->orderByDesc('id')->get();
    }
}
