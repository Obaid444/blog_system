<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate input
        $request->validate([
            'title'=> 'required|min:3',
            'content'=> 'required|min:5',
        ]);
Post::create($request->only(['title', 'content']));

//redirect with success message
   return redirect()->route('posts.index')
                  ->with('success','Post created successfully!');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
               return view('posts.edit', compact('post'));     // ➑ load form with old data

    }

    /**
     * Update the specified resource in storage.
     */
     // 6. Update post
    public function update(Request $request, Post $post)
    {
        // ➒ validate
        $request->validate([
            'title'   => 'required|min:3',
            'content' => 'required|min:5',
        ]);

        // ➓ update DB
        $post->update($request->only(['title', 'content']));

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully!');
    }

    // 7. Delete post
    public function destroy(Post $post)
    {
        $post->delete();                               // ⓫ remove row
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted!');
    }
}
