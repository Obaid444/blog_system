@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <h1 class="text-2xl font-bold mb-4">All Posts</h1>

    @forelse ($posts as $post)
        <article class="border rounded p-4 mb-4">
            {{-- Title with link to show page --}}
            <h2 class="text-xl font-semibold">
                <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">
                    {{ $post->title }}
                </a>
            </h2>

            {{-- Post meta info --}}
            <p class="text-sm text-gray-500 mt-2">
                By {{ $post->user->name ?? 'Unknown' }}
                in {{ $post->category->name ?? 'Uncategorized' }}
                · {{ $post->created_at->diffForHumans() }}
            </p>

            {{-- Content preview --}}
            <p class="text-gray-700 mt-2">
                {{ \Illuminate\Support\Str::limit($post->content, 140) }}
            </p>

            {{-- Action buttons --}}
            <div class="mt-3 flex space-x-2">
                @can('update', $post)
                    <a href="{{ route('posts.edit', $post) }}"
                       class="text-blue-600 hover:underline">Edit</a>
                @endcan

                @can('delete', $post)
                    <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                @endcan
            </div>
        </article>
    @empty
        <p class="text-gray-500">No posts yet.</p>
    @endforelse

    {{-- Pagination controls --}}
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection
