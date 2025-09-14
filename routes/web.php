<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
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