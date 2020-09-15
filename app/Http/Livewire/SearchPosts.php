<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class SearchPosts extends Component
{
    public $categories;
    public $category_id;
    public $search_word;

    public function filterByCategoryId()
    {
        $this->emit('filterByCategoryId', ['category_id' => $this->category_id]);
    }

    public function filterBySearchWord()
    {
        $this->emit('filterBySearchWord', ['search_word' => $this->search_word]);
    }

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.search-posts');
    }
}
