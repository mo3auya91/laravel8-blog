<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('app.posts') }}
        </h2>
        <a href="{{route('posts.create')}}">{{__('app.create_post')}}</a>
    </x-slot>
    <livewire:all-posts :posts="$posts"/>
    {{--    @livewire('all-posts',['posts' => $posts])--}}
</x-app-layout>
