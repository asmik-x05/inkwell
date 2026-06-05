<x-layout>
    <section class="min-h-screen">
        <div class=" py-4 flex justify-center"><x-search-modal /></div>
        @if ($trending->isEmpty())
            <div class="flex flex-col justify-center items-center h-[70vh] text-2xl text-gray-400">
                <i class="fa-regular fa-rectangle-xmark text-9xl"></i>
                <p>No trending articles found.</p>
            </div>
        @else
            @foreach ($trending as $i => $article)
                <x-blog-card-full title="{{ $article->title }}" category="{{ $article->category->name }}"
                    date="{{ $article->created_at->format('M j, Y') }}" readTime="{{ $article->read_time }}"
                    link="{{ $article->slug }}" :i="$i" body="{{ $article->body }}"
                    categorySlug="{{ $article->category->slug }}" />
            @endforeach
            {{ $trending->links() }}
        @endif
    </section>
</x-layout>
