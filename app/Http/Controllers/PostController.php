<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Jobs\SendPostPublishedEmail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $posts = Post::with(['user','category'])
        ->latest()
        ->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
       return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    // ✅ Validate input
    $validated = $request->validate([
        'title'   => 'required|min:3',
        'content' => 'required|min:5',
        'category_id' => ['required','exists:categories,id'],
    ]);

    // create the post (assuming auth user)
    $post = $request->user()->posts()->create($validated);

    // QUEUE THE JOB (runs in background)
    SendPostPublishedEmail::dispatch($post);            // (1)
    // OR with a 10-second delay:
    // SendPostPublishedEmail::dispatch($post)->delay(now()->addSeconds(10));

    return redirect()->route('posts.index')->with('success', 'Post created! We will email you shortly.');
}


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
            $post->load(['user','category','comments.user']);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
               
              $this->authorize('update',$post);     // ➑ load form with old data
              $categories = Category::orderBy('name')->get();
                  return view('posts.edit', compact('post','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
     // 6. Update post
    public function update(Request $request, Post $post)
    {

            $this->authorize('update', $post);

        // ➒ validate
        $request->validate([
            'title'   => 'required|min:3',
            'content' => 'required|min:5',
            'category_id' => ['required','exists:categories,id'],

        ]);

        // ➓ update DB
$post->update($request->only(['title', 'content', 'category_id']));

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully!');
    }

    // 7. Delete post
    public function destroy(Post $post)
    {

            $this->authorize('delete', $post);

        $post->delete();                               // ⓫ remove row
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted!');
    }
}
