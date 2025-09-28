<div class="mt-4">
    <label class="block font-medium">Category</label>
    <select
        name="category_id"
        class="w-full border rounded px-3 py-2 @error('category_id') border-red-500 @enderror"
    >
        <option value="" disabled {{ old('category_id', $post->category_id ?? '') === '' ? 'selected' : '' }}>
            -- Select a category --
        </option>

        @foreach ($categories as $category)
            <option
                value="{{ $category->id }}"
                {{ (string) old('category_id', $post->category_id ?? '') === (string) $category->id ? 'selected' : '' }}
            >
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    @error('category_id')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
