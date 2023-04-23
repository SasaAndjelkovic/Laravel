<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\File;

Route::get('/', function () {

    $posts = Post::all();

    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('posts/{post:slug}', function(Post $post) //Post::where ('slug', $post)->firstOrFail()
//Route::get('posts/{post}', function(Post $post) //Post::where ('slug', $post)->firstOrFail()
{    
    
    return view('post', [
        'post' => $post
    ]);
});

