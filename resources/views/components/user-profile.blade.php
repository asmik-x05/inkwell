@auth
    <div class="relative">
        <button id="avatar-btn"
            onclick="document.getElementById('avatar-menu').classList.toggle('hidden')"
            class="w-8 h-8 rounded-full bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-medium flex items-center justify-center transition-colors duration-200 cursor-pointer"
            aria-label="{{ auth()->user()->name }}">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </button>

        <div id="avatar-menu" class="hidden absolute right-0 mt-2 w-44 bg-gray-900 rounded-lg border border-white/10 py-1 z-50">
            <span class="block px-4 py-2 text-xs text-gray-500 truncate">
                {{ auth()->user()->name }}
            </span>
            <hr class="border-white/10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left px-4 py-2 text-sm text-gray-300 hover:bg-white/5 transition-colors">
                    Log out
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('click', function(e) {
            const btn = document.getElementById('avatar-btn');
            const menu = document.getElementById('avatar-menu');
            if (btn && menu && !btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
@else
    <a href="{{ route('login') }}" {{ $attributes->merge(['class' => 'text-sm text-gray-300 hover:text-white transition-colors duration-200 px-3 py-1.5']) }}>
        Login
    </a>
@endauth