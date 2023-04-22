<?php

use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\File;


Route::get('/', function () {
    $document = Spatie\YamlFrontMatter\YamlFrontMatter::parseFile(resource_path('posts/my-fourth-post.html'));

    dd($document);

    // $files = File::files(resource_path("posts"));
    // $documents = [];

    // foreach($files as $file) {
    //     $documents[] = YamlFrontMatter::parseFile($file);
    // }
    
    $posts = Post::all();

    //dd($posts[0]->getContents());

    return view('posts', [
        'posts' => $posts
    ]);
  
});



Route::get('posts/{post}', function($slug) 
//Find a post by its slug and pass it to a view called "post"
{    
    $post = Post::find($slug);

    return view('post', [
        'post' => $post
    ]);

})->where('post', '[A-z_\-]+');

