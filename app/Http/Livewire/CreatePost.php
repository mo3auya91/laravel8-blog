<?php

namespace App\Http\Livewire;

use App\Events\NewPost;
use App\Http\Requests\PostStoreRequest;
use App\Jobs\SyncMedia;
use App\Notification\ReviewNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class CreatePost extends Component
{
    public function render()
    {
        return view('livewire.create-post');
    }

    public function createPost(PostStoreRequest $request)
    {
        $post = auth('web')->user()->posts()->create($request->validated());

        //Notification::send($post->user, new ReviewNotification($post));

        SyncMedia::dispatch($post);

        //event(new NewPost($post));

        $request->session()->flash('success', __('app.created_successfully'));

        return redirect()->route('posts.index');
    }
}
