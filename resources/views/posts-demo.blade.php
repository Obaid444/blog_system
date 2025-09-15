@extends('layouts.app')

@section('title', 'Posts Demo')

@section('content')
    <h1>Latest Posts</h1>

    @foreach($posts as $post)
        <div class="mb-3 border-bottom pb-2">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->content }}</p>
            <small class="text-muted">Posted on {{ $post->created_at->format('M d, Y H:i') }}</small>
        </div>
    @endforeach

    @if($posts->isEmpty())
        <p>No posts available.</p>
    @endif
@endsection
