<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified'])->only(['create']);
    }

    public function index(): View
    {
        return view('posts.index');
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function show(Post $post, string $slug): View
    {
        return view('posts.show', ['post' => $post]);
    }
}
