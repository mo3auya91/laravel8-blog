<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('app.create_post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="blog text-gray-700 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                            <form class="w-full max-w-lg" method="post" enctype="multipart/form-data"
                                  action="{{route('posts.store')}}">
                                @csrf
                                @foreach(LOCALS() as $key => $locale)
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label for="title_{{$key}}"
                                                   class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                                {{__('app.title') . ' (' . $locale['native'] . ')'}}
                                            </label>
                                            <input id="title_{{$key}}" type="text" name="title[{{$key}}]"
                                                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                            <p class="text-gray-600 text-xs italic">*</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <div class="w-full px-3">
                                            <label
                                                for="content_{{$key}}"
                                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                                {{__('app.content')}}
                                            </label>
                                            <textarea id="content_{{$key}}" name="content[{{$key}}]"
                                                      class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"
                                            ></textarea>
                                            {{-- <p class="text-gray-600 text-xs italic">Re-size can be disabled by set by resize-none / resize-y / resize-x / resize</p>--}}
                                            <p class="text-gray-600 text-xs italic">*</p>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="md:flex md:items-center">
                                    <div class="md:w-1/3">
                                        <button type="submit"
                                            class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                            {{__('app.publish')}}
                                        </button>
                                    </div>
                                    <div class="md:w-2/3"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
