<?php

namespace App\Http\Controllers;

use App\Events\NewPost;
use App\Http\Requests\PostStoreRequest;
use App\Jobs\SyncMedia;
use App\Models\Post;
use App\Notification\ReviewNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    /**
     * @param PostStoreRequest $request
     * @return RedirectResponse
     */
    public function store(PostStoreRequest $request)
    {
        $post = auth('web')->user()->posts()->create($request->validated());

        Notification::send($post->user, new ReviewNotification($post));

        SyncMedia::dispatch($post);

        event(new NewPost($post));

        $request->session()->flash('posts.title', $post->title);

        return redirect()->route('posts.index');
    }

    public function show(Post $post, string $slug)
    {
        return view('posts.show', ['post' => $post]);
    }
}
