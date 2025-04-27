<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">
<x-navigation />

<main class="max-w-7xl mx-auto mt-6 px-4 flex gap-6">
    {{-- Feed --}}
    <section class="flex-1 space-y-6">
        <x-article-card />
        <x-article-card />
    </section>

    {{-- Sidebar --}}
    <aside class="hidden lg:block w-80 space-y-6 sticky top-20">
        <x-sidebar-trending />
        <x-sidebar-who-to-follow />
        <x-sidebar-footer />
    </aside>
</main>
</body>
</html>
