<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ucfirst($post->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="blog text-gray-700 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="max-w-screen-lg mx-auto">
                            <main class="mt-10">

                                <div class="mb-4 md:mb-0 w-full mx-auto relative">
                                    <div class="px-4 lg:px-0">
                                        <h2 class="text-4xl font-semibold text-gray-800 leading-tight">
                                            {{ ucfirst($post->title) }}
                                        </h2>
                                        <div class="header-content inline-flex ">
                                            @foreach($post->categories as $category)
                                                <div
                                                    class="category-badge flex-1  h-4 w-4 m rounded-full m-1 bg-purple-100">
                                                    <div class="h-2 w-2 rounded-full m-1 bg-purple-500 "></div>
                                                </div>
                                                <a href="#{{$category->title}}">
                                                    <div
                                                        class="category-title flex-1 text-sm"> {{$category->title}}</div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <img src="{{$post->image}}" class="w-full object-cover lg:rounded"
                                         style="height: 28em;" alt="{{ ucfirst($post->title) }}"
                                         title="{{ ucfirst($post->title) }}">
                                </div>

                                <div class="flex flex-col lg:flex-row lg:space-x-12">

                                    <div
                                        class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
                                        {!! $post->content !!}
                                    </div>

                                    <div class="w-full lg:w-1/4 m-auto mt-12 max-w-screen-sm">
                                        <div class="p-4 border-t border-b md:border md:rounded">
                                            <div class="flex py-2">
                                                <img src="{{@$post->user->profile_photo_url}}"
                                                     class="h-10 w-10 rounded-full mr-2 object-cover"/>
                                                <div>
                                                    <p class="font-semibold text-gray-700 text-sm"> {{@$post->user->name}} </p>
                                                    {{--<p class="font-semibold text-gray-600 text-xs"> {{@$post->user->image}} </p>--}}
                                                </div>
                                            </div>
                                            <p class="text-gray-700 py-3">
                                                {{@$post->user->name}}
                                            </p>
                                            <button
                                                class="px-2 py-1 text-gray-100 bg-green-700 flex w-full items-center justify-center rounded">
                                                Follow
                                                <i class='bx bx-user-plus ml-2'></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </main>
                            <!-- main ends here -->

                            <!-- footer -->
                            <footer class="border-t mt-12 pt-12 pb-32 px-4 lg:px-0">
                                comments section
                            </footer>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
