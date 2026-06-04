<x-layout>
    <section class="min-h-screen">
        
        <div class="flex items-center gap-2 flex-wrap font-medium text-gray-100 py-4 justify-center">
            <a href="{{ route('categories') }}"
                class="px-2 py-1 rounded-xl border mx-2
        {{ empty($slugs) ? 'bg-violet-950 border-violet-400 text-white' : 'hover:bg-violet-950 hover:border-violet-400 hover:text-white' }}">
                All
            </a>
            @foreach ($categories as $item)
                @php
                    $newSlugs = in_array($item->slug, $slugs)
                        ? array_values(array_diff($slugs, [$item->slug])) // deselect
                        : [...$slugs, $item->slug]; // select
                @endphp
                <a href="{{ route('categories', ['filter' => $newSlugs]) }}"
                    class="px-2 py-1 rounded-xl border mx-2
            {{ in_array($item->slug, $slugs) ? 'bg-violet-950 border-violet-400 text-white' : 'hover:bg-violet-950 hover:border-violet-400 hover:text-white' }}">
                    {{ $item->name }}
                </a>
            @endforeach
        </div>
        @foreach ($articles as $i => $article)
            <x-blog-card-full title="{{ $article->title }}" category="{{ $article->category->name }}"
                date="{{ $article->created_at->format('M j, Y') }}" readTime="{{ $article->read_time }}"
                link="/{{ $article->slug }}" :i="$i" body="{{ $article->body }}"
                categorySlug="{{ $article->category->slug }}" />
        @endforeach
        {{ $articles->links() }}
    </section>
</x-layout>
