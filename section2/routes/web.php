<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('posts');
    //return ['foo'=>'boo'];
});

//PRVI KORAK
// Route::get('post', function () {
//     $post = file_get_contents(__DIR__ . '/../resources/posts/my-first-post.html');
//     return view('post', [
//         'post' => $post
//     ]);
// });


//DRUGI KORAK
// Route::get('posts/{post}', function($slug){   //http://127.0.0.1:8000/posts/bla
//     return $slug;                             //bla  
// });

Route::get('posts/{post}', function($slug) {
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if(! file_exists($path)){
        return redirect('/');
        //abort(404);
    }

    $post = file_get_contents($path);
    
    return view('post', [
        'post' => $post
    ]);

});

