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

Route::get('posts/{post}', function($slug) 
//Find a post by its slug and pass it to a view called "post"
{    
    $post = Post::findOrFail($slug);

    return view('post', [
        'post' => $post
    ]);
});

