<?php
namespace App\Http\Controllers\Api;
use App\Http\Resources\PostResource;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostApiController extends Controller
{
   
public function index()
{
    return PostResource::collection(Post::with(['user','category'])->get());
}

  
public function show(Post $post)
{
    return new PostResource($post->load(['user','category']));
}
}
