

<article class="grid grid-cols-2 gap-4 bg-white rounded-lg shadow-sm p-4">
    <!-- col 1: force it to 3rem -->
    <div class="w-12 flex flex-col items-center pt-2">
        {{-- COLUMN 1: thumbnail --}}
        <div class="w-12 h-12 bg-gray-200 rounded"></div>

        {{-- COLUMN 2: article content --}}
        <div class="space-y-1">
            <div class="text-sm text-gray-500">News Website</div>
            <h3 class="font-semibold text-gray-900">Title of the News Article</h3>
            <p class="text-sm text-gray-600">A short summary of the news article goes here. It’s only a placeholder for now.</p>

            <div class="flex items-center justify-between mt-2">
                {{-- reactions --}}
                <div class="flex space-x-2 text-sm">
                    <button class="flex items-center space-x-1 text-gray-500 hover:text-blue-500">
                        👍 <span>24</span>
                    </button>
                    <button class="flex items-center space-x-1 text-gray-500 hover:text-blue-500">
                        😡 <span>3</span>
                    </button>
                    <button class="flex items-center space-x-1 text-gray-500 hover:text-blue-500">
                        😢 <span>5</span>
                    </button>
                </div>

                {{-- tags --}}
                <div class="flex space-x-2">
                    <span class="px-2 py-0.5 bg-gray-100 text-gray-500 text-xs rounded-full hover:bg-gray-200">Politics</span>
                    <span class="px-2 py-0.5 bg-gray-100 text-gray-500 text-xs rounded-full hover:bg-gray-200">World</span>
                    <span class="px-2 py-0.5 bg-gray-100 text-gray-500 text-xs rounded-full hover:bg-gray-200">Opinion</span>
                </div>
            </div>
        </div>
    </div>

    <!-- col 2: auto-fill -->
    <div class="space-y-2">
        <!-- news + opinion -->
    </div>
</article>
