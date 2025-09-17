<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Laravel App') }}</title>

    <!-- ✅ Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Tailwind, Alpine, Axios, etc. compiled by Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-vh-100 bg-light">
    {{-- ✅ Navbar --}}
    @include('layouts.navigation')

    {{-- ✅ Page Heading (optional) --}}
    @isset($header)
        <header class="bg-white shadow-sm mb-4">
            <div class="container py-3">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- ✅ Page Content --}}
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- ✅ Bootstrap JS (with Popper) via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Debug collapse events (optional, safe to remove later) -->
    <script>
        document.addEventListener('show.bs.collapse', e => console.log('Opening:', e.target));
        document.addEventListener('shown.bs.collapse', e => console.log('Opened:', e.target));
        document.addEventListener('hide.bs.collapse', e => console.log('Closing:', e.target));
        document.addEventListener('hidden.bs.collapse', e => console.log('Closed:', e.target));
    </script>
</body>
</html>
