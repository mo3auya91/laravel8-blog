<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{--        Total: {{$posts->total()}}--}}
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <section class="blog text-gray-700 body-font">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                        @forelse($posts as $post)
                            <div
                                class="p-4 md:w-1/3 md:mb-0 mb-6 flex flex-col justify-center items-center max-w-sm mx-auto">
                                <div class="bg-gray-300 h-56 w-full rounded-lg shadow-md bg-cover bg-center"
                                     style="background-image: url('{{$post->image}}')"></div>

                                <div class=" w-70 bg-white -mt-10 shadow-lg rounded-lg overflow-hidden p-5">

                                    @foreach($post->categories as $category)
                                        <div class="header-content inline-flex ">
                                            <div
                                                class="category-badge flex-1  h-4 w-4 m rounded-full m-1 bg-purple-100">
                                                <div class="h-2 w-2 rounded-full m-1 bg-purple-500 "></div>
                                            </div>
                                            <div class="category-title flex-1 text-sm"> {{$category->title}}</div>
                                        </div>
                                    @endforeach
                                    <a href="{{route('posts.show', ['post' => $post->id, 'slug' => slug($post->title)])}}">
                                        <div class="py-3 title-post font-bold">{{$post->title}}</div>
                                    </a>

                                    <div class="summary-post text-base text-justify">
                                        {{strlen(strip_tags($post->content)) > 100 ? \Illuminate\Support\Str::substr(strip_tags($post->content),0,100) . '...' : strip_tags($post->content)}}
                                        <a href="{{route('posts.show', ['post' => $post->id, 'slug' => slug($post->title, '-', 'ar')])}}"
                                           class="bg-blue-100 text-blue-500 mt-4 block rounded p-2 text-sm ">
                                            <span class="">{{__('app.read_more')}}</span></a>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <p>{{__('app.no_posts')}}</p>
                        @endforelse
                    </div>
                    <div class="mt-5">{{$posts->links()}}</div>
                </div>
            </section>
        </div>
    </div>
</div>
