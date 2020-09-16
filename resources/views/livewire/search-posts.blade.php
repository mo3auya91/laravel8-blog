<div class="main">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="hero">
            <div class="box pt-6">
                <div class="box-wrapper">
                    <div class=" bg-white rounded flex items-center w-full p-3 shadow-sm border border-gray-200">
                        <button @click="getImages()" class="outline-none focus:outline-none">
                            <svg class=" w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                        <label for="search_word" class="hidden"></label>
                        <input type="search" name="search_word" id="search_word"
                               wire:model="search_word"
                               wire:keydown.debounce.500ms="filterBySearchWord"
                               placeholder="search for a post"
                               class="w-full pl-4 text-sm outline-none focus:outline-none bg-transparent">
                        <div class="select">
                            <label for="category_id" class="hidden"></label>
                            <select name="category_id" id="category_id" wire:model="category_id"
                                    wire:change="filterByCategoryId"
                                    class="text-sm outline-none focus:outline-none bg-transparent">
                                <option value="all">All</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
