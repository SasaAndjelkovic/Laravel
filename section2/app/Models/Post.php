<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post {
    public static function find($slug) {
        
        $path = resource_path("posts/{$slug}.html");

        if(! file_exists($path)){
            throw new ModelNotFoundException();
        }
    
        return cache()->remember("posts.{$slug}", now()->addHour(), fn() => file_get_contents($path));
    }
}