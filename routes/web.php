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
    return view('posts');
});

// Using '{}' in the route, is considered a wildcard, meaning that any string written in place of {post} will be matched and passed to the closure as a parameter, in this case, its called $slug
Route::get('/posts/{post}', function($slug){
 
  // remember to always check if the fiven path exists
  if(! file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html"))
  {
    return redirect('/');
  }

  $post = cache()->remember("post.{$slug}" , 5 , fn() => file_get_contents($path));  
  
  return view('post',['post' => $post]);

})->where('post', '[A-z_\-]+'); // Only allow upper/Lowercase letters as well as dashes and underscores