@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <h1 class="mb-4 text-2xl font-bold">Create Post</h1>

    <!-- Show validation errors -->
    @if($errors->any())
        <div class="mb-4 p-3 rounded bg-red-100 text-red-700">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Title -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500 px-3 py-2">
                @error('title')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" rows="6"
                          class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500 px-3 py-2">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
    @include('posts._form', ['post' => null, 'categories' => $categories])

            <!-- Buttons -->
            <div class="flex gap-2">
                <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                    Save
                </button>
                <a href="{{ route('posts.index') }}"
                   class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
