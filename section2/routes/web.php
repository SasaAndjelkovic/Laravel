<?php

use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\File;


Route::get('/', function () {

    //fdfff
    $posts = Post::all();

    //COLLECTIONS 2
    // $posts = collect(File::files(resource_path("posts")))
    // ->map(fn($file) => YamlFrontMatter::parseFile($file))
    // ->map(fn($document) => new Post(
    //     $document->title,
    //     $document->excerpt,
    //     $document->date,
    //     $document->body(),
    //     $document->slug,
    // ));
    
    
    //COLLECTIONS 1
    // $files = File::files(resource_path("posts"));

    // $posts = collect($files)
    //     ->map(function ($file) {
    //     $document = YamlFrontMatter::parseFile($file);

    //     return $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug,
    //     );
    // });
   
    //ARRAY_MAP
    // $files = File::files(resource_path("posts"));
    // $posts = array_map(function ($file) {
    //     $document = YamlFrontMatter::parseFile($file);

    //     return $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug,
    //     );
    // }, $files);

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

