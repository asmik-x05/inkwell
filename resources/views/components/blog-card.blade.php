@props(['title', 'category', 'date', 'readTime', 'link', 'i', 'categorySlug'])
<div
    class="grid gap-4 p-4 border border-gray-600 shadow-md hover:scale-105 transition-transform duration-300 cursor-pointer">
    <span class="bg-gray-800 text-xl h-8 w-8 rounded-r-4xl flex justify-center items-center">{{ $i + 2 }}</span>
    <a href="/categories/{{ $categorySlug }}"><span
            class="text-purple-700 px-2 py-1 rounded ">{{ $category }}</span></a>
    <a href="{{ route('article', $link) }}">
        <h3 class="text-2xl font-bold">{{ Str::words($title, 6) }}</h3>
    </a>
    <div class="flex gap-4 items-center text-sm text-gray-500">
        <p class="text-sm text-gray-500">{{ $date }}</p>
        <p>{{ $readTime }} min read</p><span
            class="text-purple-700 hover:text-gray-100 text-xl hover:bg-purple-700 h-8 w-8 rounded-full flex items-center justify-center"><a
                href="{{ route('article', $link) }}">-></a></span>
    </div>

</div>
