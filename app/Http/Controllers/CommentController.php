<?php

namespace App\Http\Controllers;

use App\Models\Comment;                                                // we will create/delete comments
use App\Models\Post;                                                   // route-model-binding for {post}
use Illuminate\Http\Request;                                           // to access form input
use Illuminate\Support\Facades\Auth;                                   // current user helper


class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request, Post $post){
        $validated = $request->validate([
            'content' => ['required','string','min:3','max:2000'],
        ]);
        $post->comments()->create([
            'user_id'=>Auth::id(),
            'content'=>$validated['content'],
        ]);

        return back()->with('success','Comment added.');
    }

    public function destroy(Comment $comment){

        if(Auth::id() !== $comment->user_id){
            abort(403);
        }
        $comment->delete();
        return back()->with('success','Comment deleted.');
    }
}
