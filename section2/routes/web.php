<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;


Route::get('/', function () {
    \Illuminate\Support\Facades\DB::listen(function ($query) {
        logger($query->sql, $query->bindings);
    });

    return view('posts', [
        'posts' => Post::with('category')->get()
    ]);
});

Route::get('posts/{post:slug}', function(Post $post) 
{    
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category){
    return view('posts', [
        'posts' => $category->posts
    ]);
});

