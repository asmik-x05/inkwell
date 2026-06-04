@props(['title', 'category', 'date', 'readTime', 'link', 'i','body', 'categorySlug'])
<div class="container mx-auto px-16">
    <div
        class="grid gap-4 p-4 border border-gray-600 shadow-md hover:scale-105 transition-transform duration-300 cursor-pointer text-gray-100">
        <span
            class="bg-gray-800 text-xl h-8 w-8 rounded-r-4xl flex justify-center items-center">{{ $i + 1 }}</span>
        <a href="/categories/{{ $categorySlug }}">
            <span class="text-purple-700 px-2 py-1 rounded ">{{ $category }}</span>
        </a>
        <a href="{{ $link }}">
            <h3 class="text-2xl font-bold">  {{ Str::words(html_entity_decode(strip_tags($title)), 13) }}</h3>
        </a>
        <p class="text-lg text-gray-300">{{ Str::words(strip_tags(html_entity_decode($body)), 20) }}</p>  

        <div class="flex gap-4 items-center justify-between text-sm text-gray-500">
            <div class="flex items-center gap-4"><p class="text-sm text-gray-500">{{ $date }}</p>
            <p>{{ $readTime }} min read</p></div><span
                class="text-purple-700 hover:text-gray-100 text-4xl hover:bg-purple-700 h-8 w-8 rounded-full flex items-center justify-center"><a
                    href="{{ $link }}">-></a></span>
        </div>

    </div>
</div>
