@component('mail::message')
# Post Published 🎉

**Title:** {{ $post->title }}

**Author:** {{ optional($post->user)->name ?? 'Unknown' }}

@component('mail::panel')
{{ \Illuminate\Support\Str::limit($post->content, 150) }}
@endcomponent

@component('mail::button', ['url' => url('/posts/' . $post->id)])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
