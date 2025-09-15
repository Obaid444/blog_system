@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
@endsection
