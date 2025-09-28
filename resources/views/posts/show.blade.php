@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <!-- Title -->
        <h1 class="text-2xl font-bold text-blue-600 mb-4">{{ $post->title }}</h1>

        <!-- Content -->
        <p class="text-gray-700 leading-relaxed mb-6">
            {{ $post->content }}
        </p>
<p>Category: {{ $post->category?->name }}</p>

        <!-- Buttons -->
        <div class="flex gap-2">
            <a href="{{ route('posts.index') }}"
               class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition">
                ← Back
            </a>
            @can('update', $post)

            <a href="{{ route('posts.edit', $post) }}"
               class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                ✎ Edit
            </a>
            @endcan

        </div>
        {{-- COMMENTS LIST -------------------------------------------------------}}
<div class="mt-8">
    <h2 class="text-xl font-semibold">
        Comments ({{ $post->comments->count() }})   {{-- shows the number of comments --}}
    </h2>

    <div class="mt-4 space-y-4">                     {{-- vertical gap between comments --}}
        @forelse ($post->comments as $comment)       {{-- loop through comments --}}
            <div class="p-4 border rounded">         {{-- a comment card --}}
                <div class="text-sm text-gray-600 flex items-center gap-2">
                    <strong>{{ $comment->user->name }}</strong>  {{-- author name --}}
                    <span>•</span>
                    <span title="{{ $comment->created_at }}">    {{-- full timestamp tooltip --}}
                        {{ $comment->created_at->diffForHumans() }} {{-- e.g., "2 minutes ago" --}}
                    </span>
                </div>

                <p class="mt-2 whitespace-pre-line"> {{-- keep line breaks in text --}}
                    {{ $comment->content }}          {{-- the comment body (escaped) --}}
                </p>

                @auth
                    @if (auth()->id() === $comment->user_id)
                        <form class="mt-2" method="POST" action="{{ route('comments.destroy', $comment) }}">
                            @csrf
                            @method('DELETE')        {{-- spoof HTTP DELETE --}}
                            <button class="text-red-600 text-sm hover:underline" type="submit">
                                Delete
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
        @empty
            <p class="text-gray-500">No comments yet. Be the first to comment!</p>
        @endforelse
    </div>
</div>

{{-- ADD COMMENT FORM ----------------------------------------------------}}
@auth
<div class="mt-8">
    <h3 class="text-lg font-semibold">Add a comment</h3>

    <form class="mt-3" method="POST" action="{{ route('comments.store', $post) }}">
        @csrf

        <div>
            <label class="block font-medium">Your Comment</label>
            <textarea
                name="content"
                rows="3"
                class="w-full border rounded px-3 py-2 @error('content') border-red-500 @enderror"
                placeholder="Write something..."
            >{{ old('content') }}</textarea>     {{-- keeps text if validation fails --}}

            @error('content')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p> {{-- inline error --}}
            @enderror
        </div>

        <button
            type="submit"
            class="mt-3 px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700"
        >
            Post Comment
        </button>
    </form>
</div>
@else
    <p class="mt-6 text-sm text-gray-600">
        Please <a class="text-blue-600 underline" href="{{ route('login') }}">log in</a> to comment.
    </p>
@endauth

    </div>
@endsection
