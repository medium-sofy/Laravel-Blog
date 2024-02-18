<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
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
    return view('posts', ['posts' => Post::all()]);
});

// Using '{}' in the route, is considered a wildcard, meaning that any string written in place of {post} will be matched and passed to the closure as a parameter, in this case, its called $slug
Route::get('/posts/{post}', function($slug){
    // Find a post by its slug and pass it to a view called post
    return view('post',['post' => Post::find($slug)]);
})->where('post', '[A-z_\-]+'); // Only allow upper/Lowercase letters as well as dashes and underscores