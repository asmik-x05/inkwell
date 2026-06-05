<x-layout>
    <section class="container mx-auto px-4 py-8">
        <article class="py-8 text-gray-100">
            <div class="container grid md:grid-cols-3 gap-8">

                <div class="col-span-2 space-y-6">
                    <div>
                        <small>{{ $post->user->name }}</small>
                        <small>
                            <i class="fa-solid fa-calendar-days"></i> Published on
                            {{ $post->created_at->format('Y-m-d') }}
                        </small>
                    </div>

                    <h1 class="text-4xl font-semibold">
                        {{ $post->title }}
                    </h1>

                    <img class="w-full" loading="lazy" src="{{ asset(Storage::url($post->image)) }}"
                        alt="{{ $post->title }} image">
                    <div>
                        {!! $post->body !!}
                    </div>
                </div>                
                <aside class="flex flex-col gap-6 items-center w-full">
                    @foreach ($advertisement as $ad)
                        <a href="{{ $ad->redirect_link }}" target="_blank" class="w-full block">
                            <img class="w-full h-auto object-contain shadow-md hover:shadow-lg shadow-[#d8d8d8] rounded-md"
                                src="{{ asset(Storage::url($ad->banner)) }}" alt="{{ $ad->company_name }}"
                                loading="lazy">
                        </a>
                    @endforeach
                </aside>
            </div>
        </article>
    </section>
    </section>
</x-layout>
