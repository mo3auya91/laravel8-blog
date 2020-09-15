<div class="container">
    <form class="w-full max-w-full justify-center" method="post" enctype="multipart/form-data"
          @submit.prevent="createPost"
        {{--action="{{route('posts.store')}}"--}}
    >
        @csrf
        @foreach(LOCALS() as $key => $locale)
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label for="title_{{$key}}"
                           class="block tracking-wide text-gray-700 text-xs font-bold mb-2">
                        {{ucfirst(__('app.title') . ' (' . $locale['native'] . ')')}}
                        <span class="text-gray-600 text-xs italic @error('title.'.$key) text-red-700 @enderror">
                        * @error('title.'.$key) <span class="text-red-700">{{ ucfirst($message) }}</span> @enderror
                    </span>
                    </label>
                    <input id="title_{{$key}}" type="text" name="title[{{$key}}]"
                           class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label
                        for="content_{{$key}}"
                        class="block tracking-wide text-gray-700 text-xs font-bold mb-2">
                        {{ucfirst(__('app.content') . ' (' . $locale['native'] . ')')}}
                        <span class="text-gray-600 text-xs italic @error('content.'.$key) text-red-700 @enderror">
                        * @error('content.'.$key) <span class="text-red-700">{{ ucfirst($message) }}</span> @enderror
                    </span>
                    </label>
                    <textarea id="content_{{$key}}" name="content[{{$key}}]"
                              class="ckeditor no-resize appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"
                    ></textarea>
                </div>
            </div>
        @endforeach
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="image" class="block tracking-wide text-gray-700 text-xs font-bold mb-2">
                    {{ucfirst(__('app.image'))}}
                </label>
                <input id="image" type="file" name="image" accept="image/*"
                       class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                @error('image') <span class="text-red-700">{{ ucfirst($message) }}</span> @enderror
            </div>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3">
                <button type="submit"
                        class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                    {{ucfirst(__('app.publish'))}}
                </button>
            </div>
            <div class="md:w-2/3"></div>
        </div>
    </form>
</div>
