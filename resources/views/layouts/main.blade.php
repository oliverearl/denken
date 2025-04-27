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

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body
    x-data="{ sidebarOpen: false }"
    class="bg-gray-50 text-gray-800 overflow-x-hidden"
>
<x-navigation />

{{-- OFF-CANVAS OVERLAY (mobile only) --}}
<div
    x-show="sidebarOpen"
    x-transition.opacity
    @click="sidebarOpen = false"
    class="fixed inset-0 bg-black bg-opacity-25 z-40 lg:hidden"
></div>

{{-- OFF-CANVAS SIDEBAR --}}
<aside
    x-show="sidebarOpen"
    x-transition:enter="transition transform duration-200"
    x-transition:enter-start="translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition transform duration-200"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full"
    @click.away="sidebarOpen = false"
    class="fixed inset-y-0 right-0 w-64 bg-white shadow-lg z-50
           lg:relative lg:translate-x-0 lg:shadow-none lg:block lg:w-80"
>
    <div class="p-4 space-y-6">
        <x-sidebar-trending />
        <x-sidebar-who-to-follow />
        <x-sidebar-footer />
    </div>
</aside>

{{-- MAIN CONTENT FEED --}}
<main class="max-w-7xl mx-auto mt-6 px-4 lg:pl-0 lg:pr-0 lg:flex lg:gap-6">
    <section class="flex-1 space-y-6">
        <x-article-card />
        <x-article-card />
    </section>
</main>

</body>
</html>
