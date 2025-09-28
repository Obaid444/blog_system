<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
 

Route::get('/', function () {
    return redirect()->route('posts.index');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// public post routes
Route::get('/posts', [PostController::class, 'index'])  // 7. Anyone can list posts.
->name('posts.index');                                  // 8. Route name = posts.index.

                                     // 10. Route name = posts.show.
Route::middleware(['auth'])->group(function(){    // 11. Group requires login.
Route::get('/posts/create', [PostController::class , 'create'])          // 12. Show form to create (must be logged in).
->name('posts.create');        // 13. Name = posts.create.

Route::post('/posts',[PostController::class, 'store'])
->name('posts.store');

Route::get('/posts/{post}/edit',[PostController::class, 'edit'])
->name('posts.edit');

Route::put('/posts/{post}',[PostController::class, 'update'])
->name('posts.update');

Route::delete('/posts/{post}',[PostController::class, 'destroy'])
->name('posts.destroy');
// route for comments section
Route::post('/posts/{post}/comments',[CommentController::class,'store'])
->name('comments.store');
                                
Route::Delete('comments/{comment}',[CommentController::class,'destroy'])
->name('comments.destroy');
});    
Route::get('/posts/{post}', [PostController::class, 'show'])  // 9. Anyone can view a single post.
->name('posts.show');    




 
 
require __DIR__.'/auth.php';
