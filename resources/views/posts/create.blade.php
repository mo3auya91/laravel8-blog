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
                            @livewire('create-post')
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.15.0/full-all/ckeditor.js"></script>
    <script>
        CKEDITOR.replaceClass = 'ckeditor';
    </script>
</x-app-layout>
