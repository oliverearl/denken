<nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-14">
        <a href="#" class="text-xl font-bold text-gray-900">Denken</a>
        <div class="hidden md:flex items-center space-x-6">
            <a href="#" class="text-gray-600 hover:text-gray-900">Home</a>
            <a href="#" class="text-gray-600 hover:text-gray-900">Trending</a>
            <a href="#" class="text-gray-600 hover:text-gray-900">Following</a>
        </div>
        <div class="flex items-center space-x-4">
            <input
                type="text"
                placeholder="Search"
                class="bg-gray-100 rounded-full px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >

            <!-- Notifications Bell -->
            <button aria-label="Notifications"
                    class="relative p-2 text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-full">
                <!-- Heroicons Bell -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14V11a6 6 0 10-12 0v3c0 .386-.147.735-.405 1.005L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>

                <!-- Unread badge -->
                <span class="absolute top-1 right-1 inline-flex h-2 w-2 rounded-full bg-red-500"></span>
            </button>

            <div class="w-8 h-8 rounded-full bg-gray-300"></div>
        </div>
    </div>
</nav>
