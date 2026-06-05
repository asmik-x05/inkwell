<x-layout>
    <section class="min-h-screen container mx-auto px-16 text-gray-200">
        <div class=" py-4 flex justify-center"><x-search-modal /></div>
        @if (!strlen($q) || $posts->isEmpty())
            <div class="flex flex-col justify-center items-center h-[70vh] text-2xl text-gray-400">
                <i class="fa-regular fa-rectangle-xmark text-9xl"></i>
                <p class="text-center">No results were found. Try a different search term.</p>
            </div>
        @else
        <p class="text-lg text-gray-300 mb-6">Showing {{ $posts->count() }} results for "{{ $q }}"</p>
            @foreach ($posts as $i => $article)
                <x-blog-card-full title="{{ $article->title }}" category="{{ $article->category->name }}"
                    date="{{ $article->created_at->format('M j, Y') }}" readTime="{{ $article->read_time }}"
                    link="{{ $article->slug }}" :i="$i" body="{{ $article->body }}"
                    categorySlug="{{ $article->category->slug }}" />
            @endforeach
            {{ $posts->links() }}
        @endif
    </section>

</x-layout>
