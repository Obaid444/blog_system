
@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    <h1 class="mb-3">All Posts</h1>

    @if(session('success'))
     <div class="alert alert-success">{{session('success')}}</div>
    @endif
<a href="{{ route('posts.create')}}" class="btn btn-primary mb-3">+ New Post</a>

  @foreach($posts as $post)
    <div class="mb-4 border-bottom pb-2">
         <h3>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            </h3>
             <p>{{ Str::limit($post->content, 100) }}</p>

                         <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>

                         <form action="{{route('posts.destroy', $post) }} " method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
</form>
  @endforeach
    @if($posts->isEmpty())
     <p>No posts found.</p>
    @endif
    @endsection
