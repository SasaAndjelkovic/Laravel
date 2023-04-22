<?php

use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\File;


Route::get('/', function () {
    
    //$document = YamlFrontMatter::parseFile(resource_path('posts/my-fourth-post.html'));
    //dd($document);
    //dd($document->body());
    //dd($document->matter());
    //dd($document->matter('title'));
    //dd($document->title);

    $files = File::files(resource_path("posts"));
    //$documents = [];
    $posts = [];

    foreach($files as $file) {
        //$documents[] = YamlFrontMatter::parseFile($file);
        $document = YamlFrontMatter::parseFile($file);
       
        $posts[] = new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug,
        );
    }

    //dd($documents);
    //dd($posts);
    //dd($posts[0]);
    //dd($posts[0]->title);
    
    //$posts = Post::all();

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

