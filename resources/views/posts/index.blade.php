@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1 class="mb-4">All Posts</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-4">+ New Post</a>

    @if($posts->isEmpty())
        <div class="alert alert-info">No posts found.</div>
    @else
        <div class="list-group">
            @foreach($posts as $post)
                <div class="list-group-item mb-3 rounded shadow-sm">
                    <h3 class="mb-2">
                        <a href="{{ route('posts.show', $post) }}" class="text-decoration-none text-primary">
                            {{ $post->title }}
                        </a>
                    </h3>
                    <p class="text-muted">{{ Str::limit($post->content, 150) }}</p>

                    <div class="d-flex gap-2">
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
