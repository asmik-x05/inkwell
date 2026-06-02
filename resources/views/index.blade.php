<x-layout>

    <section class="bg-gray-950 text-gray-100 border-b border-gray-800">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 h-full p-6 md:p-10">

            <div class="p-12 flex flex-col justify-between h-[80vh] border border-gray-800 shadow-2xl">
                <p class="text-sm uppercase tracking-[0.3em] text-violet-400">Featured</p>

                <div class="flex-1 flex flex-col justify-center space-y-6 max-w-xl">
                    <h1 class="text-4xl md:text-5xl font-extrabold ">Tittle of article goes here</h1>
                    <p class="text-lg text-gray-300">This is a short excerpt introducing the article. It uses the
                        page theme colors and typography to match the rest of the site.</p>
                </div>

                <div class="flex items-center justify-between gap-4 pt-6">

                    <span class="text-sm text-gray-400">Jun 2, 2026 · 6 min read</span>
                    <a href="#"
                        class="inline-block bg-violet-600 hover:bg-violet-700 text-white px-4 py-2 rounded-lg">Read
                        <span>-></span></a>
                </div>
            </div>

            <!-- Right: Quote panel -->
            <div class="p-12 flex flex-col justify-between h-full border border-gray-800 shadow-2xl">
                <p class="text-sm uppercase tracking-[0.3em] text-violet-400">Quote of the day</p>

                <div class="flex-1 flex flex-col justify-center max-w-md space-y-6">
                    <blockquote class="text-xl md:text-2xl italic text-gray-100">“Writing is the painting of the voice.”
                    </blockquote>
                    <p class="text-sm text-gray-400">— Voltaire</p>
                    <p class="text-gray-300">A short note or context about the quote can live here, giving readers a
                        reason to click through to the full article.</p>
                </div>
                <div class="pt-6 flex items-center justify-between">
                    <span class="text-sm text-gray-400">Inspired by the theme of the day</span>
                    <span class="text-sm text-gray-400">- @php echo date('Y M d')
                    @endphp</span>
                </div>

            </div>
        </div>
    </section>

    <section class="container mx-auto px-16 bg-gray-950 text-gray-100 py-8">

        <h4 class="text-xl mb-4">Recent Posts</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2">
            <x-blog-card />
            <x-blog-card />
            <x-blog-card />
            <x-blog-card />
        </div>
    </section>

    <section class="container mx-auto px-16 border-t border-gray-600  text-gray-100 bg-gray-950">

        <div class="grid grid-cols-1 md:grid-cols-3 ">
            <div class="min-h-40 col-span-2 p-4 text-gray-200">
                <h4 class="text-xl mb-4">Categories</h4>
                @php
                    $categories = ['Technology', 'Design', 'Business'];
                @endphp
                <div class="flex items-center gap-2 flex-wrap font-medium">

                    @foreach ($categories as $item)
                        <a href=""
                            class="hover:bg-gray-400 hover:text-gray-950 px-2 py-1 rounded-xl border mx-2">{{ $item }}</a>
                    @endforeach
                </div>
            </div>
            <div class="p-4 border-t md:border-l md:border-t-0 text-gray-200">
                <h4 class="text-xl">by the numbers</h4>
                <div class="grid my-4">
                    <div class="flex justify-between border-b border-gray-300 space-y-2  mt-4">
                        <p>Posts published</p> <span>24</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-300 space-y-2  mt-4">
                        <p>Word Written</p> <span>24</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-300 space-y-2  mt-4">
                        <p>Writing since</p> <span>2024</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-950 container mx-auto px-8 py-4 border-t border-gray-600 text-gray-100">
        <div class="  py-12 flex flex-col items-center  gap-4">
            <p class="text-sm text-gray-500">Get new posts in your inbox</p>
            <form class="grid sm:flex gap-2 w-full max-w-sm" action="/subscribe/newsletter" method="POST">
                @csrf
                <input type="email" placeholder="your@email.com" name="email" id="email"
                    class="  rounded-lg px-4 py-2 text-sm text-white placeholder-gray-400 focus:outline-none border border-gray-800" />
                <button type="submit"
                    class="cursor-pointer bg-violet-700 hover:bg-violet-800 text-gray-100 rounded-lg px-2 py-1 active:scale-95 transition-all duration-300 ease-in-out">
                    Subscribe
                </button>
            </form>
        </div>
    </section>
</x-layout>
