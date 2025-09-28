 
@component('mail::message')
# Post Published

Your post **{{ $post->title }}** has been published.

@component('mail::panel')
{{ \Illuminate\Support\Str::limit($post->content, 120) }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
