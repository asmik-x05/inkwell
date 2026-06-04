<x-layout>
    <div class=" flex justify-center items-center text-gray-100">
    </div>
    @foreach ($trending as $i => $article)
        <x-blog-card-full title="{{ $article->title }}" category="{{ $article->category->name }}"
            date="{{ $article->created_at->format('M j, Y') }}" readTime="{{ $article->read_time }}"
            link="/{{ $article->slug }}" :i="$i" body="{{ $article->body }}" />
    @endforeach
    {{ $trending->links() }}
</x-layout>
