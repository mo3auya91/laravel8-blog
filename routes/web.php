<?php

use App\Http\Controllers\PostController;
use App\Http\Livewire\CreatePost;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('posts/create', [CreatePost::class, 'createPost'])->name('livewire.posts.show');
    Route::resource('posts', PostController::class)->except(['show', 'store']);
    Route::get('posts/{post}/{slug?}', [PostController::class, 'show'])->name('posts.show');
});
