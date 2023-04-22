<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {

    public $title;  //My First Post => my-first-post
    public $excerpt;
    public $date; 
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all() 
    {
        return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug,
        ));
    }

    public static function find($slug) 
    {   
        // of all the blog posts, find the one with a slug that matches the one that was requested.

        $posts = static::all();
        
        //sada je kolekcija... get the first item by the given key value pair
        return $posts->firstWhere('slug', $slug);

        // $path = resource_path("posts/{$slug}.html");

        // if(! file_exists($path)){
        //     throw new ModelNotFoundException();
        // }
    
        // return cache()->remember("posts.{$slug}", now()->addHour(), fn() => file_get_contents($path));
    }
}