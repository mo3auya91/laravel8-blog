{{--<div class="pt-2 relative mx-auto text-gray-600">--}}
{{--    <label>--}}
{{--        <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"--}}
{{--               type="search" name="search" placeholder="Search">--}}
{{--    </label>--}}
{{--    <button type="button" class="absolute right-0 top-0 mt-5 mr-4">--}}
{{--        <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"--}}
{{--             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"--}}
{{--             viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"--}}
{{--             width="512px" height="512px">--}}
{{--            <path--}}
{{--                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>--}}
{{--          </svg>--}}
{{--    </button>--}}
{{--</div>--}}
{{--<body x-data="imageGallery()"--}}
{{--      x-init="fetch('https://pixabay.com/api/?key=15819227-ef2d84d1681b9442aaa9755b8&q=woman+girl+food&image_type=all&per_page=52&')--}}
{{--      .then(response => response.json())--}}
{{--      .then(response => { images = response.hits })"--}}
{{--      class="bg-white">--}}

<div class="main">
    {{--    <div class="px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">--}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- hero -->
        <div class="hero">
            <!-- image search box -->
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
                        <input type="search" name="search_word" id="search_word" wire:input="filterBySearchWord" wire:model="search_word"
                               placeholder="search for a post"
                               class="w-full pl-4 text-sm outline-none focus:outline-none bg-transparent">
                        <div class="select">
                            <label for="category_id" class="hidden"></label>
                            {{--todo pass the parameters to the component and update parent component--}}
                            <select name="category_id" id="category_id" wire:model="category_id"
                                    wire:change="filterByCategoryId"
                                    class="text-sm outline-none focus:outline-none bg-transparent">
                                <option value="all" selected>All</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>

            {{--            <section id="photos" class="my-5 grid grid-cols-1 md:grid-cols-4 gap-4">--}}
            {{--                <template x-for="image in images" :key="image.id">--}}
            {{--                    <a :href="image.largeImageURL" class="hover:opacity-75 " target="_new"><img class="w-full h-64 object-cover" :src="image.largeImageURL" :alt="image.tags" /></a>--}}
            {{--                </template>--}}
            {{--            </section>--}}

        </div>

        {{--        <footer class="p-5 text-sm text-gray-600 text-center inline-flex items-center">--}}
        {{--            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart fa-w-16 text-red-600 w-4 h-4 mr-4 align-middle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path></svg>--}}
        {{--            <span>Made by <a href="https://tailwindcss.com/" target="_new" class="text-teal-600 font-semibold">tailwindcss</a> & <a href="https://github.com/alpinejs/alpine" target="_new" class="text-teal-600 font-semibold">alpinejs</a></span>--}}
        {{--        </footer>--}}
    </div>
</div>
{{--<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>--}}
{{--<script>--}}
{{--    function imageGallery() {--}}
{{--        return {--}}
{{--            images: [],--}}
{{--            api_key : "15819227-ef2d84d1681b9442aaa9755b8",--}}
{{--            q: "",--}}
{{--            image_type: "",--}}
{{--            page: "",--}}
{{--            per_page: 52,--}}
{{--            getImages: async function() {--}}
{{--                console.log("params", this.q, this.image_type);--}}
{{--                const response = await fetch(--}}
{{--                    `https://pixabay.com/api/?key=${this.api_key}&q=${--}}
{{--                        this.q--}}
{{--                    }&image_type=${this.image_type}&per_page=${this.per_page}&page=${this.page}`--}}
{{--                );--}}
{{--                const data = await response.json();--}}
{{--                this.images = data.hits;--}}
{{--            }--}}
{{--        };--}}
{{--    }--}}
{{--</script>--}}
