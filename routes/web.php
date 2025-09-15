<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Models\Post;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/',[PageController::class, 'home']);

//simple text respone
Route::get('/hello',function(){
    return "Hello Laravel!";
});

//Route that loads a view
Route::get('/about',function(){
    return view('about');
});

//contact page
Route::get('/contact',function(){
    return view('contact');
});
//route for posts
Route::get('/posts', function(){
    $posts = Post::all();
    return view('posts',['posts' => $posts]);
});
Route::get('/posts-demo', function(){
    $posts = Post::latest()->take(10)->get();
    return view('posts-demo', compact('posts'));
});