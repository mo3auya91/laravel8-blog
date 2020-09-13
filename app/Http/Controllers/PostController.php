<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified'])->only(['create']);
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::query()->orderByDesc('id')->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post, string $slug)
    {
        return view('posts.show', ['post' => $post]);
    }
}
