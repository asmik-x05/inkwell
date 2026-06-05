<header class="bg-gray-950 border-b border-white/10 sticky top-0 z-40">
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center mx-4">
            <h1 class=" text-2xl font-bold">
                <a href="{{ route('home') }}"
                    class="bg-linear-to-br  from-purple-400 via-purple-500 to-indigo-950 bg-clip-text text-transparent">{{ config('app.name') }}</a>
            </h1>            
            <nav class="gap-6 items-center text-gray-200 text-sm hidden sm:flex">
                <a href="{{ route('home') }}"
                    class="relative after:absolute after:bottom-0 after:left-0 after:h-px after:w-0 after:bg-violet-400 after:transition-all hover:after:w-full">Home</a>
                <a href="{{ route('categories') }}"
                    class="relative after:absolute after:bottom-0 after:left-0 after:h-px after:w-0 after:bg-violet-400 after:transition-all hover:after:w-full">Categories</a>
                <a href="{{ route('trending') }}"
                    class="relative after:absolute after:bottom-0 after:left-0 after:h-px after:w-0 after:bg-violet-400 after:transition-all hover:after:w-full">Trending</a>

            </nav>

            <div class="flex items-center gap-3">
                <a href="{{ route('search') }}"
                    class="text-gray-400 hover:text-white transition-colors duration-200 p-2 hidden sm:flex">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
                <x-user-profile />
                <button id="mobile-menu-button"
                    class="sm:hidden text-gray-400 hover:text-white transition-colors duration-200 p-2">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
    <div id="mobile-menu" class="hidden sm:hidden border-t border-white/10 bg-gray-950">
        <nav class="flex flex-col px-6 py-4 gap-4 text-gray-200 text-sm">
            <a href="{{ route('search') }}">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('categories') }}">Categories</a>
            <a href="{{ route('trending') }}">Trending</a>

        </nav>
    </div>
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</header>
