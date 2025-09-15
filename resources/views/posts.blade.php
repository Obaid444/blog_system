@extends('layouts.app')
@section('title', 'Posts')
@section('content')

<h1>All posts</h1>
@foreach($posts as $post)
   <div class="mb-3">
     <h3>{{$post->title}}</h3>
     <p>{{$post->content}}</p>
</div>
@endforeach
@if($posts->isEmpty())
  <p>NO posts found.</p>
@endif

@endsection