<header class="bg-gray-950 border-b border-white/10 sticky top-0 z-40">
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center mx-4">
            <h1 class=" text-2xl font-bold">
                <a href="{{ route('home') }}"
                    class="bg-linear-to-br  from-purple-400 via-purple-500 to-indigo-950 bg-clip-text text-transparent">{{ config('app.name') }}</a>
            </h1>
            <button id="mobile-menu-button" class="text-gray-400 hover:text-white transition-colors duration-200 p-2 sm:hidden">
                <i class="fa-solid fa-bars"></i>
            </button>
            <nav class="gap-6 items-center text-gray-200 text-sm hidden sm:flex">
                <a href="{{ route('home') }}" class="">Home</a>
                <a href="{{ route('categories') }}" class="">Categories</a>
                <a href="{{ route('trending') }}" class="">Trending</a>

            </nav>

            <div class="flex items-center gap-3">
                <button class="text-gray-400 hover:text-white transition-colors duration-200 p-2">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                {{-- <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200 p-2">
                    <i class="fa-regular fa-bookmark"></i>
                </a> --}}
                <a href="{{ route('login') }}"
                    class="text-sm text-gray-300 hover:text-white transition-colors duration-200 px-3 py-1.5">
                    Login
                </a>
            </div>
        </div>
    </div>

</header>
