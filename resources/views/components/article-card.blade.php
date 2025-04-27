<article class="bg-white rounded-lg shadow p-6 space-y-6">
    {{-- Article Preview --}}
    <div class="flex items-start space-x-4">
        <div class="w-12 h-12 bg-gray-200 rounded"></div>
        <div class="flex-1 space-y-1">
            <div class="text-sm text-gray-500">News Website</div>
            <h2 class="text-lg font-semibold text-gray-900">Title of the News Article</h2>
            <p class="text-sm text-gray-600">
                A short summary of the news article goes here. It’s only a placeholder for now.
            </p>
            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                {{-- reactions --}}
                <div class="flex space-x-4 text-sm">
                    <button class="flex items-center space-x-1 text-gray-500 hover:text-blue-500">👍<span>24</span></button>
                    <button class="flex items-center space-x-1 text-gray-500 hover:text-blue-500">😡<span>3</span></button>
                    <button class="flex items-center space-x-1 text-gray-500 hover:text-blue-500">😢<span>5</span></button>
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

    {{-- Nested Opinions --}}
    <div class="space-y-6">
        <x-opinion />
        <x-opinion />
    </div>
</article>
